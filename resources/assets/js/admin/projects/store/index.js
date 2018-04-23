import Form from 'assets/js/admin/projects/form';

export default {
    namespaced: true,
    state() {
        return {
            form: new Form(),
            activePackage: {},
            selectedPackages: {},
        }
    },
    mutations: {
        form: (state, form) => state.form = form,
    },
    actions: {
        form: (context, form) => context.commit('form', form),
        togglePackage: ({state}, packageKey) => {
            if (state.selectedPackages[packageKey]) {
                delete state.selectedPackages[packageKey];
            } else {
                Vue.set(state.selectedPackages, packageKey, true);
            }
            state.selectedPackages = Object.assign({}, state.selectedPackages);
        }
    },
    getters: {
        form: state => state.form,
        selectedPackages: state => state.selectedPackages,
    }
};