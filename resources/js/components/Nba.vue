<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"><br><br>
                <input type="email" v-model="filterVar" class="form-control" placeholder="Search Name">
                <button @click="exportCSV()" class="btn btn-primary">export</button>
                <div class="card-header">Player General Info</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">number</th>
                            <th scope="col">pos</th>
                            <th scope="col">height</th>
                            <th scope="col">weight</th>
                            <th scope="col">dob</th>
                            <th scope="col">nationality</th>
                            <th scope="col">years exp</th>
                            <th scope="col">college</th>
                            <th scope="col">age</th>
                            <th scope="col">games</th>
                            <th scope="col">age</th>
                            <th scope="col">games started</th>
                            <th scope="col">minutes played</th>
                            <th scope="col">field goals</th>
                            <th scope="col">field goals attempted</th>
                            <th scope="col">free throws</th>
                            <th scope="col">free throws attempted</th>
                            <th scope="col">offensive rebounds</th>
                            <th scope="col">defensive rebounds</th>
                            <th scope="col">assists</th>
                            <th scope="col">steals</th>
                            <th scope="col">blocks</th>
                            <th scope="col">personal fouls</th>
                            <th scope="col">turn over</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr v-for="i in totals">
                                <td>{{ i.name }}</td>
                                <td>{{ i.number }}</td>
                                <td>{{ i.pos }}</td>
                                <td>{{ i.height }}</td>
                                <td>{{ i.weight }}</td>
                                <td>{{ i.dob }}</td>
                                <td>{{ i.nationality }}</td>
                                <td>{{ i.years_exp }}</td>
                                <td>{{ i.college }}</td>

                                <!-- performance -->
                                <td>{{ i.player_total[0].age }}</td>
                                <td>{{ i.player_total[0].games }}</td>
                                <td>{{ i.player_total[0].games_started }}</td>
                                <td>{{ i.player_total[0].minutes_played }}</td>
                                <td>{{ i.player_total[0].field_goals }}</td>
                                <td>{{ i.player_total[0].field_goals_attempted }}</td>
                                <!-- <td>{{ i.player_total[0].3pt }}</td>
                                <td>{{ i.player_total[0].3pt_attempted }}</td>
                                <td>{{ i.player_total[0].2pt }}</td>
                                <td>{{ i.player_total[0].2pt_attempted }}</td> -->
                                <td>{{ i.player_total[0].free_throws }}</td>
                                <td>{{ i.player_total[0].free_throws_attempted }}</td>
                                <td>{{ i.player_total[0].offensive_rebounds }}</td>
                                <td>{{ i.player_total[0].defensive_rebounds }}</td>
                                <td>{{ i.player_total[0].assists }}</td>
                                <td>{{ i.player_total[0].steals }}</td>
                                <td>{{ i.player_total[0].blocks }}</td>
                                <td>{{ i.player_total[0].personal_fouls }}</td>
                                <td>{{ i.player_total[0].turnovers }}</td>
                           </tr>
                        </tbody>
                        </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['total'],
        data() {
            var scope = this
            return {
                totals: scope.total,
                filterVar: ''
            }
        },
        mounted() {
            console.log(this.total)
        },
        watch: {
            filterVar: function(filter) {                        
                this.filterQuery(filter)
            }
        },
        methods:{
            filterQuery(){
                var scope = this
                
                 this.totals = this.totals.filter(query => {
                    return query.name.toLowerCase().includes(scope.filterVar.toLowerCase());
                })    
            },

            exportCSV(){
                var scope = this
                axios.post('exportCSV', {filter: scope.filterVar}).then(response => {
                    window.location.href = response.data;
                })
                
            }
        }
    }
</script>
