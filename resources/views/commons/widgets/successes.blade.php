@if(Session::has('successes'))

    <div class="alert alert-success" role="alert">
    
    	<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close" style="margin-top: -14px;margin-right: -8px;">
		  <span aria-hidden="true">&times;</span>
		</button>

        <div class="row">

        	<div class="col-xs-12">

		        <ul style="padding-right: 40px;">
		        @foreach (Session::get('successes') as $key => $success)
		            <li>
		            	<i class="fa fa-btn fa-info-circle"></i>
		            	{{$success}}
		            </li>
		        @endforeach
		        </ul>

		    </div>
		
		</div>

    </div>

@endif