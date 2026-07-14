document.addEventListener('alpine:init', () => {
    Alpine.store('cart', {
        count: window.__cartCount || 0,
        modalOpen: false,
        loading: false,
        error: null,
        toastMessage: null,

        product: null,
        colors: [],
        selectedColor: null,
        selectedSize: null,
        qty: 1,

        csrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },

        async openQuickView(slug) {
            this.modalOpen = true;
            this.loading = true;
            this.error = null;
            this.product = null;
            this.colors = [];
            this.selectedColor = null;
            this.selectedSize = null;
            this.qty = 1;

            try {
                const res = await fetch(`/productos/${slug}/quick-view`, {
                    headers: { Accept: 'application/json' },
                });
                if (!res.ok) throw new Error('quick-view failed');
                const data = await res.json();

                this.product = data;
                const seen = new Set();
                this.colors = data.variants.filter((v) => {
                    if (seen.has(v.color)) return false;
                    seen.add(v.color);
                    return true;
                });
                this.selectedColor = this.colors[0]?.color ?? null;
            } catch (e) {
                this.error = 'No se pudo cargar el producto.';
            } finally {
                this.loading = false;
            }
        },

        closeModal() {
            this.modalOpen = false;
        },

        selectColor(color) {
            this.selectedColor = color;
            this.selectedSize = null;
            this.qty = 1;
        },

        selectSize(size) {
            this.selectedSize = size;
            this.qty = 1;
        },

        sizesForColor(color) {
            if (!this.product) return [];
            return this.product.variants.filter((v) => v.color === color);
        },

        get currentImage() {
            if (!this.product) return null;
            const withImage = this.product.variants.find((v) => v.color === this.selectedColor && v.image);
            return withImage ? withImage.image : this.product.image;
        },

        get selectedVariant() {
            if (!this.product) return null;
            return this.product.variants.find(
                (v) => v.color === this.selectedColor && v.size === this.selectedSize
            ) ?? null;
        },

        async addToCart() {
            const variant = this.selectedVariant;
            if (!variant || variant.stock < 1) return;

            this.loading = true;
            this.error = null;

            try {
                const res = await fetch('/carrito/agregar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken(),
                    },
                    body: JSON.stringify({ variant_id: variant.id, quantity: this.qty }),
                });
                const data = await res.json();

                if (!res.ok) {
                    this.error = data.message || 'No se pudo agregar al carrito.';
                    return;
                }

                this.count = data.count;
                this.modalOpen = false;
                this.toast('Agregado al carrito');
            } catch (e) {
                this.error = 'No se pudo agregar al carrito.';
            } finally {
                this.loading = false;
            }
        },

        toast(message) {
            this.toastMessage = message;
            setTimeout(() => {
                this.toastMessage = null;
            }, 2500);
        },
    });
});
