<template>
    <div>
        <div class="card mb-3 p-1 movie-card" v-for="movie in movies.data">
            <div class="d-flex flex-row">
                <div class="movie-card-img col-sm-6 col-md-2 pl-sm-0 pr-sm-0">
                    <img v-lazy="movie.image" class="img-fluid">
                </div>
                <div class="movie-card-details col-sm-6 col-md-10 pl-sm-0 pr-sm-0">
                    <div>
                        <h5 id="title" class="font-weight-bold"> {{ movie.name }} </h5>
                        <span id="rating"><i class="fas fa-star"></i> {{ movie.rating }} </span>
                    </div>
                    <div class="mb-2 description">
                        <p class="font-weight-bold mb-0" v-if="movie.directors != ''">Directors: <span class="font-weight-normal">{{ movie.directors }}</span></p>
                        <p class="font-weight-bold mb-0" v-if="movie.writers != ''">Writers: <span class="font-weight-normal">{{ movie.writers }}</span></p>
                        <p class="font-weight-bold mb-0" v-if="movie.stars != ''">Stars: <span class="font-weight-normal">{{ movie.stars }}</span></p>
                    </div>
                    <div>
                        <a type="button" class="btn btn-secondary btn-sm w-100">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="getMovies(pagination.prev_page_url)">Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">{{ pagination.current_page }} of {{ pagination.last_page }}</a>
                </li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="getMovies(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    props: ['resource'],

    created() {
        this.getMovies();
    },

    data() {
        return {
            movies: [],
            pagination: {},
        };
    },

    methods: {
        getMovies(api_url) {
            let vm = this;
            api_url = api_url || this.resource;
            axios.get(api_url)
                .then(response => {
                    this.movies = response.data;
                    vm.paginator(response.data.meta, response.data.links);
                })
                .catch(error => {
                });
        },
        paginator(meta, links) {
            this.pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
        },
    },

}
</script>
