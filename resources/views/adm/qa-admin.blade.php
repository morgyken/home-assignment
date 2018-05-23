@extends('layout.listing-layout12')
  @section('title')

    All-Questions

    @endsection

    @section('content')

<div class="card border-info mb-12">
            <div class="card-header bg-transparent border-info">
              <div class="col-md-8">

              <h3>Welcome,this is a Quality Assurance Account</h3>
            </div>
             
          </div>

            <div class="card-body text-info">
                                
                <!--Section: Cards-->
            <section class="pt-9">

              
                <!-- Heading & Description -->
                @for($i=0; $i<=50; $i ++)

                <!--Grid row-->
                <div class="row wow fadeIn">
                    
                    <div class="col-lg-8  mb-8">
                        <h4 class="mb-3 font-weight-bold dark-grey-text">
                            <strong>MDB Quick Start</strong>
                        </h4>
                        <p class="grey-text">Get started with MDBootstrap, the world's most popular Material Design framework for building responsive, Get started with MDBootstrap, the world's most popular Material Design framework for building responsive,
                            mobile-first sites.</p>
                        <p>
                            <strong>5 minutes, a few clicks and... done. You will be surprised at how easy it is.</strong>
                        </p>
                        <a href="#" target="_blank" class="btn btn-primary btn-md">Start tutorial
                            <i class="fa fa-play ml-2"></i>
                        </a>
                    </div>
                    <!--Grid column-->
                    <div class="col-lg-3 col-xl-3 ml-xl-3 mb-3">
                       
                        <div class="card-body">
                          <h6 class="card-title">Special title treatment</h6>
                          <p class="card-text">building responsive, framework for building responsive</p>
                      </div>
                        
                    </div>

                </div>
                <!--Grid row-->

                <hr class="mb-5">

                @endfor

                <!--Pagination-->
                <nav class="d-flex justify-content-center wow fadeIn">
                    <ul class="pagination pg-blue">

                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active">
                            <a class="page-link" href="#">1
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--Pagination-->


                <hr class="mb-5">

                
            </section>
            <!--Section: Cards-->

            </div>
            <div class="card-footer bg-transparent border-success">Footer</div>
        </div>

        @endsection