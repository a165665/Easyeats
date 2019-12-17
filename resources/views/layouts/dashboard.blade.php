@extends('layouts.app')


@section('content')
    
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Category over Sales</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">Total Sales Number</span>
                  <span>{{$totalCategory}}</span>
                </p>
                {{-- <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p> --}}
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <div id="visitors-chart" style="height: 300px; width: 100%;"></div>
              </div>

              {{-- <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This Week
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last Week
                </span>
              </div> --}}
            </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Top Dishes</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sales</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($topDishes as $topDish)
                  <tr>
                    <td>
                      <img src="{{ asset('/img/Menu_pic/'.$topDish->dish->id.'.jpg') }}" alt="Product 1" class="img-circle img-size-32 mr-2" height="7%" width="10%">
                      {{$topDish->dish->name}}
                    </td>
                    <td>RM{{$topDish->dish->price}}</td>
                    <td>
                      {{-- <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small> --}}
                      {{$topDish->total}} Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                      
                  @endforeach   
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales</h3>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                <span class="text-bold text-lg">
                  @php
                      $totalsale = 0;
                  @endphp
                  @foreach ($sales as $sale)
                      @php
                          $totalsale += $sale['y']
                      @endphp
                  @endforeach
                  RM{{$totalsale}}
                </span>
                  <span>Sales Over Past 7 Days</span>
                </p>
                {{-- <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                  </span>
                  <span class="text-muted">Since last month</span>
                </p> --}}
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <div id="sales-chart" style="height: 300px; width: 100%;></div>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This year
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last year
                </span>
              </div>
            </div>
          </div>
          <!-- /.card --> 

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Menu Overview</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-sm btn-tool">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-sm btn-tool">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-success text-xl">
                  <i class="ion ion-ios-refresh-empty"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-success"></i> {{$totalDish}}
                  </span>
                  <span class="text-muted">TOTAL DISH</span>
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-warning text-xl">
                  <i class="ion ion-ios-cart-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-warning"></i>{{$totalDish - $nonhalal}}
                  </span>
                  <span class="text-muted">HALAL DISH</span>
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="d-flex justify-content-between align-items-center mb-0">
                <p class="text-danger text-xl">
                  <i class="ion ion-ios-people-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                  <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-down text-danger"></i>{{$nonhalal}}
                  </span>
                  <span class="text-muted">NON HALAL DISH</span>
                </p>
              </div>
              <!-- /.d-flex -->
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

@endsection
<script src="plugins/canvasjs.min.js"></script>
<script type="text/javascript">
 let topCategories = <?php echo json_encode($topCategories, JSON_NUMERIC_CHECK); ?>;
 let sales = <?php echo json_encode($sales, JSON_NUMERIC_CHECK); ?>;

// for (let i = 0; i < 6; i++) {
//   sales[i].x = new Date(sales[i].x);
//   sales[i].x.setHours(0,0,0,0);
// }
    console.log(topCategories);

    window.onload = function () {
      var chart = new CanvasJS.Chart("visitors-chart", {
        height:260,
        // title:{
        // text: "Category over Sales"
        // },
        data: [
        {
          type: "column",
          dataPoints: topCategories
        }
        ]
      });
  
      chart.render();
    
    var chart2 = new CanvasJS.Chart("sales-chart", {
      animationEnabled: true,
      theme: "light2",
      // title:{
      //   text: "Sales"
      // },
      axisX:{
        valueFormatString: "DD MMM",
        crosshair: {
          enabled: true,
          snapToDataPoint: true
        }
      },
      data: [{        
        type: "line",       
        dataPoints: sales
      }]
    });
    chart2.render();
    
    }
    </script>


<script src="/js/app.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>