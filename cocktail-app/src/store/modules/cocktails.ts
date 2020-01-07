import axios from 'axios';

const state = {
    cocktails: [{}],
    cocktail: [{}],
};

const getters = {
    AllCocktails: (state: any) => state.cocktails ,
    SingleCocktail: (state: any) => state.cocktail,
};

const actions = {
    async fetchCocktails({ commit }: any){
        const response = await axios.get('http://crafttest.test/api/cocktails.json');
        commit('setCocktails', response.data.data);
    },
    async fetchSingleCocktail({ commit }: any, id: number){
        const response = await axios.get('http://crafttest.test/api/cocktails/'+ id +'.json');
        commit('setSingleCocktail', response.data.data[0]);
    }
};
const mutations = {
    setCocktails: (state: any, cocktails: any) => (state.cocktails = cocktails),
    setSingleCocktail: (state: any, cocktail: any) => (state.cocktail = cocktail),
};

export default{
    state,
    getters,
    actions,
    mutations
}