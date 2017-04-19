@if(!$errors->isEmpty())

    <div class="alert alert-danger" role="alert">
		
		<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close" style="margin-top: -14px;margin-right: -8px;">
		  <span aria-hidden="true">&times;</span>
		</button>

        <div class="row">

        	<div class="col-xs-12">

		        <ul style="padding-right: 40px;">
		        @foreach ($errors->all() as $key => $error)
		            <li>
		            	<i class="fa fa-btn fa-info-circle"></i>
		            	{{$error}}
		            </li>
		        @endforeach
		        </ul>

		    </div>

		</div>

    </div>

@endif