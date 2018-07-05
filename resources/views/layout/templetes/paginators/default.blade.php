<div class="row">
	<div class="col-xs-12 text-xs-center col-sm-12 text-sm-center col-md-8 col-lg-8">
		@if(method_exists($collection, 'appends'))
		    <div class="paginator-default">
		        {!! $collection->appends(Request::except('page'))->render() !!}
		    </div>
	    @endif
	</div>
	<div class="col-xs-12 text-xs-center col-sm-12 text-sm-center col-md-4 text-md-right col-lg-4 text-lg-right padding-top5 padding-bottom20">
	    <div id="total_results">
	        A busca retornou 
	        <strong id="count_results">
        		@if(method_exists($collection,'total'))
	        		{!! $collection->total() !!}
        		@else
        			{!! $collection->count() !!}
        		@endif
        	</strong>
	        registro(s)
	    </div>
    </div>
</div>