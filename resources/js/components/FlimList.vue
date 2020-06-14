<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Flims</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            </thead>
                            <tbody>
                            <tr v-for="flim in flims">
                                <td>{{flim.name}}</td>
                                <td>{{ flim.description}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination
                            class="display-inline"
                            @current="syncPageWithPaginate($event)"
                            :total="meta.total"
                            :perPage="parseInt(meta.per_page)"
                            :currentPage="meta.current"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import client from './client';
    import Pagination from "./lib/Pagination";
    export default {
        name: "flim-list",
        components: {
            Pagination
        },
        data() {
          return {
              flims : '',
              meta: {
                  per_page: 3,
                  current:1,
                  total:0
              }
          }
        },
        mounted() {
          this.fetchFlims();
        },
        methods:{
            fetchFlims() {
              client.get(flimRoute + "?page=" + this.meta.current).then(response => {
                  this.flims = response.data.flims.data;
                  this.meta.per_page = response.data.flims.per_page;
                  this.meta.total = response.data.flims.total;
              });
            },
            syncPageWithPaginate($event) {
                this.meta.current = $event;
                this.fetchFlims();
            },
        }
    }
</script>
