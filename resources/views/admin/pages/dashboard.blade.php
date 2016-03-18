@extends('admin.base')



@section('content')
    <div class="cl-page-header">
        <div class="container">
            <h2 class="page-title">Home</h2>
            <hr>
        </div>
    </div>
    <div class="row analytics">
        <div class="col l8">
            <h5 class="sub-section-heading">Visitors in the last 30 days</h5>
            <barchart datasource="/admin/api/analytics/pageviews"></barchart>
        </div>
        <div class="col l4">
            <h5 class="sub-section-heading">Blog post breakdown</h5>
            <donutchart datasource="/admin/api/analytics/article-count"></donutchart>
        </div>
    </div>
    <div class="row analytics">
        <div class="col l6">
            <h5 class="sub-section-heading">Most visited pages in the last 90 days</h5>
            <polarchart datasource="/admin/api/analytics/most-visited"></polarchart>
        </div>
        <div class="col l6">
            <h5 class="sub-section-heading">Top referrers for the last 90 days</h5>
            <polarchart datasource="/admin/api/analytics/referrers"></polarchart>
        </div>
    </div>
    <div class="container">
        <div class="stat-badge">
            <span class="stat-label">Visitors last month</span>
            <span class="stat-num">{{ $totalVisitors }}</span>
        </div>
        @foreach($categories as $category)
            <div class="stat-badge">
                <span class="stat-label">published {{ str_plural($category->name) }}</span>
                <span class="stat-num">{{ $category->posts->count() }}</span>
            </div>
        @endforeach
    </div>

    <template id="polar-template">
        <canvas width="300" height="300"></canvas>
    </template>
    <template id="bar-template">
        <canvas></canvas>
    </template>
@endsection

@section('bodyscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script>
        Vue.component('donutchart', {

            props: {
                datasource: String,
                chartOptions: {
                    default: function() {
                        return {
                            segmentShowStroke : true,
                            segmentStrokeColor : "#fff",
                            segmentStrokeWidth : 2,
                            percentageInnerCutout : 50, // This is 0 for Pie charts
                            animationSteps : 100,
                            animationEasing : "easeOutBounce",
                            animateRotate : true,
                            animateScale : false,
                        }
                    }
                },
                chartwidth: {
                    type: Number,
                    default: 300
                },
                chartheight: {
                    type: Number,
                    default: 300
                }
            },

            template: '#bar-template',

            ready: function() {
                var self = this;
                this.$el.width = this.chartwidth;
                this.$el.height = this.chartheight;
                this.$http.get(this.datasource).then(function(res) {
                    new Chart(self.$el.getContext('2d')).Doughnut(res.data, self.options);
                }).catch(function(err) {console.log(err)})
            }
        });
        Vue.component('barchart', {

            props: {
                datasource: String,
                chartOptions: {
                    default: function() {
                        return {
                            scaleBeginAtZero : true,
                            scaleShowGridLines : false,
                            scaleGridLineColor : "rgba(0,0,0,.05)",
                            scaleGridLineWidth : 1,
                            scaleShowHorizontalLines: true,
                            scaleShowVerticalLines: true,
                            barShowStroke : false,
                            barStrokeWidth : 0,
                            barValueSpacing : 2,
                            barDatasetSpacing : 1
                        }
                    }
                },
                chartwidth: {
                    type: Number,
                    default: 800
                },
                chartheight: {
                    type: Number,
                    default: 400
                }
            },

            template: '#bar-template',

            ready: function() {
                var self = this;
                this.$el.width = this.chartwidth;
                this.$el.height = this.chartheight;
                this.$http.get(this.datasource).then(function(res) {
                    new Chart(self.$el.getContext('2d')).Bar(res.data, self.options);
                }).catch(function(err) {console.log(err)})
            }
        });
        Vue.component('polarchart', {

            props: ['datasource'],

            template: '#polar-template',

            ready: function() {
                var self = this;
                this.$http.get(this.datasource).then(function(res) {
                    new Chart(self.$el.getContext('2d')).PolarArea(res.data);
                }).catch(function(err) {console.log(err)})
            }
        });

        new Vue({el: 'body'});
    </script>
@endsection