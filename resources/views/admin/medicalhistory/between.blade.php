<x-layouts.adminLayout>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Between Dates | Reports</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>Between Dates</span>
                        </li>
                        <li class="active">
                            <span>Reports</span>
                        </li>
                    </ol>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Between Dates Reports</h5>
                                    </div>
                                    <div class="panel-body">                        
                                        <form role="form" method="POST" action="{{ route('admin.report.show') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">
                                                     From Date:
                                                </label>
                                                <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required>
                                                @error('fromdate')
                                                    <p class ="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">
                                                     To Date::
                                                </label>
                                                <input type="date" class="form-control" name="todate" id="todate" value="" required>
                                                @error('todate')
                                                    <p class ="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>	
                                            <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>  
                            </div>                                
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-white">                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</x-layouts.adminLayout>