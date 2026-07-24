document.addEventListener('alpine:init', () => {
    Alpine.data('catalogFilters', (initialFilters) => ({
        filters: {
            category: initialFilters.category || [],
            gender: initialFilters.gender || [],
            sport: initialFilters.sport || [],
            color: initialFilters.color || [],
            size: initialFilters.size || [],
            price_min: initialFilters.price_min || '',
            price_max: initialFilters.price_max || '',
            is_new: initialFilters.is_new || false,
            bestseller: initialFilters.bestseller || false,
        },
        products: [],
        hasFiltered: false,
        loading: false,
        drawerOpen: false,
        _abortController: null,
        _priceTimer: null,

        isChecked(group, value) {
            return this.filters[group].includes(value);
        },

        toggle(group, value) {
            const list = this.filters[group];
            const idx = list.indexOf(value);
            if (idx === -1) {
                list.push(value);
            } else {
                list.splice(idx, 1);
            }
            this.apply();
        },

        onPriceInput() {
            clearTimeout(this._priceTimer);
            this._priceTimer = setTimeout(() => this.apply(), 400);
        },

        clearAll() {
            this.filters = {
                category: [], gender: [], sport: [], color: [], size: [],
                price_min: '', price_max: '', is_new: false, bestseller: false,
            };
            this.apply();
        },

        buildQueryString() {
            const params = new URLSearchParams();
            ['category', 'gender', 'sport', 'color', 'size'].forEach((key) => {
                this.filters[key].forEach((value) => params.append(key + '[]', value));
            });
            if (this.filters.price_min) params.set('price_min', this.filters.price_min);
            if (this.filters.price_max) params.set('price_max', this.filters.price_max);
            if (this.filters.is_new) params.set('is_new', '1');
            if (this.filters.bestseller) params.set('bestseller', '1');
            return params.toString();
        },

        async apply() {
            this.hasFiltered = true;
            this.drawerOpen = false;

            if (this._abortController) {
                this._abortController.abort();
            }
            const controller = new AbortController();
            this._abortController = controller;
            this.loading = true;

            const qs = this.buildQueryString();
            history.replaceState(null, '', '/productos' + (qs ? '?' + qs : ''));

            try {
                const res = await fetch('/productos/buscar' + (qs ? '?' + qs : ''), {
                    headers: { Accept: 'application/json' },
                    signal: controller.signal,
                });
                const data = await res.json();
                if (this._abortController === controller) {
                    this.products = data;
                }
            } catch (e) {
                if (e.name !== 'AbortError' && this._abortController === controller) {
                    this.products = [];
                }
            } finally {
                if (this._abortController === controller) {
                    this.loading = false;
                }
            }
        },
    }));
});
