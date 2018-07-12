
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Contact form-->
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header primary-color white-text">
                <h4 class="title">
                    <i class="fa fa-pencil"></i>Log in Here </h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <form method="post" action="{{route('login')}}" />
            <div class="modal-body">

                <!-- Material input name -->
                <div class="md-form form-sm">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="text" id="materialFormNameModalEx1" name="email" class="form-control form-control-sm">
                    <label for="materialFormNameModalEx1">Username</label>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Material input email -->
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" name="password" id="materialFormEmailModalEx1" class="form-control form-control-sm">
                    <label for="materialFormEmailModalEx1">Password</label>
                </div>

                <div class="text-center mt-4 mb-2">
                    <button class="btn btn-primary">Log in 
                        <i class="fa fa-send ml-2"></i>
                    </button>
                </div>

                </form>

                 <div class="text-center mt-4 mb-2">
                   <a href="#"> Forgot Password? </a>
                       
                   
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
    <!--/Modal: Contact form-->
</div>
                      