@extends('master')

@section('title', 'FAQ')

@section('body')
	<div class="title sub-title">
		<h1>@yield('title')</h1>			
	</div>

	<div class="content just-text">
		<div>
			<h4>1. <span class="highlight bold">"Big Plan"</span> là gì?</h4>
		</div>
		<div>
			<p>Dự án <span class="highlight bold">"Big Plan"</span> là dự án cung cấp công cụ giúp các bạn lên kế hoạch sinh con một cách an toàn và khoa học. Hiện tại <span class="highlight bold">"Big Plan"</span> cung cấp công cụ tính toán khoảng thời gian có thể thụ thai khi quan hệ, giúp các bạn chủ động lên kế hoạch sinh con, hoặc có thể tránh thai an toàn nhất.</p>
		</div>
		<br>
		<div>
			<h4>2. Công cụ xác định thời gian thụ thai của <span class="highlight bold">"Big Plan"</span> dựa trên phương pháp nào?</h4>
		</div>
		<div>
			<p>Công cụ xác định thời gian thụ thai này được xây dựng dựa trên <a href="https://en.wikipedia.org/wiki/Calendar-based_contraceptive_methods" target="_blank"><span class="highlight italic">Phương pháp Ogino-Knaus</span></a>, hay còn được gọi là phương pháp tính vòng kinh, căn cứ vào chu kỳ kinh nguyệt của bạn nữ.</p>
		</div>
		<br>
		<div>
			<h4>3. Chu kỳ kinh nguyệt không đều có thể áp dụng công cụ này không?</h4>
		</div>
		<div>
			<p>Nhờ phương pháp tính vòng kinh do Bác sĩ <span class="highlight italic bold">Aly Abbara</span> tìm ra, ta có thể xác định được cả chu kỳ hành kinh không đều. Vì vậy công cụ của <span class="highlight bold">"Big Plan"</span> hoàn toàn hỗ trợ cho những bạn có chu kỳ đều hoặc chu kỳ không đều.</p>
		</div>
		<br>
		<div>
			<h4>4. Tôi chưa muốn có con. Vậy tôi sử dụng thế nào đây?</h4>
		</div>
		<div>
			<p>Công cụ này cho biết thời gian dễ thụ thai, như vậy khoảng thời gian còn lại được xem là "an toàn" nhé.</p>
		</div>
	</div>
@stop