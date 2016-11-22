@extends('default.layouts.default')
@section('content')

<!--
/*==============================*\
MAIN 
/*==============================*\
-->
<div id="main" class="screen">
	<div class="main_wrapper">
		
		<div class="page_contact_wrapper clearfix">
			<div class="page_contact_left screen"></div>
			<div class="page_contact_right">
				<div class="page_contact_right_inner">
					
					<div class="page_contact_sidelink">
						<a href="{{ URL::to('/contact') }}">Liên hệ tư vấn</a>
						<a class="current" href="{{ URL::to('/question') }}">Câu hỏi thường gặp</a>
					</div>
					<div class="page_contact_right_header">
						Câu hỏi thường gặp
					</div>
					<section id="list_faq" data-accordion-group>
						
					  @foreach( Question::all() as $q)
					  <section data-accordion>
						<button data-control>{{ $q->question }}</button>
						<div data-content>
						  <article>
						  	{{ $q->answers }}
						  </article>
						</div>
					  </section>
					  @endforeach
					</section>
				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection