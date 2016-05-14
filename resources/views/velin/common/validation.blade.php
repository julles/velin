@if($errors->any() > 0)
@section('script')
	
	@php($str = '<ul style = "margin-left:30%;text-align:left;">')
	
	@foreach($errors->all() as $error)
		@php($str .= '<li>'.$error.'</li>')
	@endforeach
	
	@php($str .= '</ul>')

	{!! Velin::flashValidation('Error Validation',$str) !!}

@endsection

@endif