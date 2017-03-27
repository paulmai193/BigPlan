@extends('master')

@section('title', 'Welcome')

@section('js')
<script src="/js/welcome.ob.js"></script>
@stop

@section('body')
	<!--@if (Route::has('login'))
		<div class="top-right links">
			@if (Auth::check())
				<a href="{{ url('/home') }}">Home</a>
			@else
				<a href="{{ url('/login') }}">Login</a>
				<a href="{{ url('/register') }}">Register</a>
			@endif
		</div>
	@endif-->

	<div class="title sub-title">
		<h1>@yield('title')</h1>			
	</div>
	<div class="ui-grid-a ui-responsive">
		<div class="ui-block-a" id="exampleBlockA">
			<div class="card" id="card0">
				<a href="/method/1">
					<div class="card-image">
						<img class="cover" alt="Chu kỳ đều" src="data:image/png;base64,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">
						<h4>Thời gian thụ thai<br>Chu kỳ đều</h4>
					</div>
				</a>
			</div>
			<div class="card" id="card1">
				<a href="/method/2">
					<div class="card-image">
						<img class="cover" alt="Chu kỳ không đều" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFL0lEQVR4XuWbRawlRRSGv8HdZ01C2EIgQIAAgeDuDsHd3WVwdwsMEiC4uxMIAQIECSxJWLDF3SX/m9OTnvtazumu7nvfndq85PUp+b5bXdJdPY3JaTrwIHAc8FnB9WH9awZwburKpw0UKPjXgJWAr4CNxl1CXkAePvMy9hIyAUXwc4UECaiCH3sJEqB7fkPH4DKWt4MEaMCTBPWEujR2ErIxYK6VkJ8FprIErQ+0TginwXXAVJRwDnBemNwyDArQv6eShLOAC5rCK1+RgKki4QzgojbwVQJGXcJpwCVt4esEjKqEU4DLUsB7BIyahJOAKwLwmh3mqdpFlo0Bg3WMwsB4AnBVAP5s4EKLL91KewUMuyfo2cQ1AfgzgYsH4gslRAQMS8IxwHUB+NOBS0viJ0mICuhbwlHADQH4U4HLa+LnkNBEQF8SjgBuCsCfDFzpjJ8toamAJhLWAr5wNvBwg/e270TgamfZWdiEBG8FZWV7Z4dHgT2Avx2NPBS4pWKVOljE8cC1jnKLQma0FeDpCRH4g4FbA/DHAtc3hJ/IlkJAlYQI/IHAzECbjgZubAOfUkCRhAj8/sAdTvj/AM0ON7eFTy0gL+HNwD2/n8FryVqXBH+kjRF1sa7rqW6BfGUrAF86B7x9gLtsvV7XYMEfBtxWFxi53oUAb/17A3cH4A8BbvcW7o0bloC9gHsC8AcBd3qhInHDEKD1wL3AvI6G/gsIXrdJJ6lvAbsB9wXgD7DbpBP4LmaBqobuCtwfgNfsoJ7SaeqrB+wMPADM56D5B9jXeoojvF1IHwJ2BB4KwGtqVE/pJXUtYAeDn99Bo19eU6NOp/SWuhSwHfAI4IHXLlFT48O9kVtFXQnYFtBewAu/p8nqmz/ZbjDf8K2Bx4AFHDT65Xe3+Lpwlbc88HldYOR66h6wFfC4E/4vg1d8XRK8bqf1ANXxbl0G7/WUArYAngAWdFQueK0LnnTEZvC6rZR+AbYHXnXkrQ1JJWAz4Ckn/J/ALsDTta2bdRvpl8/gsyx/2HZbwlulFAI2NfiFHC0R/E7As47YMvgsq6ZNPUXSjrJpmt5WwCb2S3rg9asJ/jlHa+vgsyL0jEBvjZo8F5w4HddGgE6RPgMs7AASvBZFLzhiFbIi8I7z4Jbi9RL0fGfZCpt9NLCpAB2rUzf2wP9ug9ZLgQYq1PvIPStW7w71fkC9oirNcS6yiYANrBsv4gASvFaELztii0KiEvTQRE+OND4UpUmHQqMC1geeBzzwvxn8Kw3hs2xRCVqEaWWpATefCk/ERgRoEaJ7eFEHkOC3sQOYjvDakKgE9TiNOb9ayaXHgb0C1jX4xWqbOqtSwb/uiI2ERCW8batGzSjZJwCT6vMIWAd4EfDCa6n6RoQsEBuV8Ik9gVK+wlQnYG1Ao/fijkZqiSp4vRTpMkUlVLalSoBeZwt+CQfNz8CWwFuO2BQhySSUCVjTpi4P/E+ANkK65/pMSSQUCVgD0NS1pING8Jvbqs0RnjyktYRBAasb/FKOpv5o8Mn25o46i0JaScgLWM322B74HwBtgd9r2OjU2bQ011QXTpmAVa2ApR0lCF5b4PcdsX2EeL55Km2HBKxi8Ms4Wvu9wX/giO0jpBW8GigB3o+mvgO0//+wDzJHHa3hMwHL2rJ15YpKBb8x8JGjYX2EJIHPBOjvctYTiiR8a/Af90HmqCMZfF5AmYRvDF5r6lFISeEHBWQStIvT3Pq1fTz96SiQO79wDTe1aCU4qp/P6+xw1TgVhleG/wGXdiQmnUVhZAAAAABJRU5ErkJggg==">
						<h4>Thời gian thụ thai<br>Chu kỳ không đều</h4>
					</div>
				</a>
			</div>
		</div>
		<div class="ui-block-b" id="exampleBlockB">
			<div class="card" id="card2">
				<a href="/track/calendar">
					<div class="card-image">
						<img class="cover" alt="Lịch kinh nguyệt" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFGklEQVR4Xu2aR6g0RRDHf585J0yYswcTRlAPgqCiGPgEERVRVETFiAHMWS9iDpgQxISoKCKYw0Uv5oSIYr6Yc078ntXYDrO7/d7u7M7zm7rM7E5PdfW/QlfV9BzmcZozj6+fDoDOAoZHYEXgcGCBCquXgAeGZz/FYS6wWYXXb8ANwGfDzDEKFzgDOL+HEKPgL+vfgflr5ngI2H3SAJwDnB1CnBvX9HtUAPzVg//VwDFtAcDFC4aUBB41AIlfAj2fc0Y4jELAOmFmLQAGMoPLTKjOAmbCp987VQuYCf//KL1qAR0AmQWUusdscIFcscUW0AFQ6GCT3AZLd4FGLeB04IIasAymCxWCOGiYvKqZpu8490WDXo53U3AfuQusEKnwghVBXgAeLBCuZMhewOaVgb8C1wNfFDBo1AIK5p/4kA6AXrtbvzygdBeYuHoLBOgsYBgL+BJYtgDltg5R9u+HBWCZtq6uQC4B+GEYAArmaP2QLgZ0FvBvmT/yTHAc9p+ETo2W6c45FhdYBzga2A3YEPgDeB94DLgOeHW6Ugcf+4t7R2P0PuAk4NNp8moUgPmAU6MxWq0HcjmvBU4Efi4Qfs3gdxAg/5xeBLYJgAtYTQ1pDABN80bgUOBH4CrgLuCtEFBL2B84HlgUeCIsxEKmjvzGYJv9CEAwtaKbs2rzGWBtYBfg0dLVNwmAGr0E+ADYGXi7h1AbA48DK8X4k2vGrQU8B6wcXeU7wwreycYKsG4moFdMGoBVgHdh6vviFsCbmUAuQrP7OPtv61igf60PvFdZwL3h60/FAutixuXAccAJgPel1IgLnAecGWZ/bEiimesSB8RvzXQ/wHRa8tlh0cSwmZHTt8CSwHLAVz1W1ioAbHio+e0yzeqvh1SEvxUwmEk7AE8DzwNaRE4fAqsDWwHyXg04ELgN+CgGtgoAg54aV2sWG17V3C8h/FLhIn7Xs5Yw+nt1zHeAz3Nyu7O/aN7+LLBTPHQbNb5IrQIgJSVuU94bxPRrNek2Jn0CGCvUrPHAyO4OYHSv9vjsH94Su0YOzN3Avm0GIGVpCQB3BO8lF71qBkAKRnUApEULlgDuAZwS0d6o31oLGDUACQgXfVkHwD/7fWcBnQt0MaALgt0u8H9KhNTmoA8vrd8GTVkXy1LhJSLN9SusiYzH2kyKpKUjFfb6NWDh430/aj0AFjRbAttH7u5i/FrroUnrATVsemsNn6rFbWNsXTHk+ztGQ2QjwOaIVJcH+L8HJF8DLgSeHABmI+VwKl6uiSaFMiwCeHbv4KgPbookRkCkS6OW92DlWRWh9wTur3GNo6Kn6HDvnS8n6xBPkvY7ldoIADY9bIhY4FjC5g2MxQMAK8ZEGwCvxA8bInmzxL9TeS2w9g1cmJXk55UFLx+FlEWY1ub4l2vOD+SvNQKAE9idsUS1Xt8VeKOHKa4LPAysB5wGXFwz7psokReOinGAVU891sUsswXaGNSLGgNAP7fbaxNTM/feXp5NUTWo1veJ46xaxR3R5PizRlItaJMYqwVYMUr5t4B071UL0CWuBF6Pd8cOgBMKgs1RzwmpvTrSlA1W+n5aWHWc3ePbS9ReMyZ1jiYCQJp0DeDIaHtvGn+qmUciiBkvBpHWYgMkUS+w0nP5C/w9Axg35gKDFtSW5x0A3dfhWf51eFhXmpEL9PvQOaxA435fAH6KSYvPB4xbyHHN1wGQIz2oJh+XViY2TwfAxKBvycSdBbREERMT42+fk75QM9DMRgAAAABJRU5ErkJggg==">
						<h4>Theo dõi chu kỳ<br>Lịch kinh nguyệt</h4>
					</div>
				</a>
			</div>
			<div class="card" id="card3">
				<a href="/track/statistic">
					<div class="card-image">
						<img class="cover" alt="Thống kê" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAAAvCAYAAABTy8xRAAACEUlEQVRoQ+2awWoUQRCG/6pVCexdRTYz3TvtWQOexJselCA+hOAtEBVFEPQoohDFixjQ1zDgGwTUIHvSnelZBBU86U2zXYJ4WEKy26Mr9G5qzn/3dH/TVfXPTBH2+UXOmEsyxFMwjo5jESR8bzHf/eD92jwxo2Ix+wzmI5GbCtuQTl3XnyL1ycuoyI00WSUTlt57/7bJmJS1yQCw1uYc5DkCToOxMDYcQ/jJ3Lrdr6sH/wo3GQBFZm6CcD92QwF4WdX+Qqx+L10yALrG3CLBvegNSdjoDwbno/V7CBVAKklQT4CGgOYATYJaBbQMzqgPcMZcHYpcY9AxADzBnIgQLpfevxjVzXQZLHL7CpCz8a6MbvTr6qECGCGgJ2CWjZCGgOYATYJaBbQMqg9QI6ROUK1wNIH/9y5gjFlot9uh1+v9mLAccs4dmspX4VSc4HFjTgbBm+jnAMhcAegudk8Rh80GAKAApvFfIJUQ0BOgIaA5QJOgVgEtg+oD1AipE2xAIBkrPI0mqb9zgp3sC1p8OBLaro2SLjNrQliNnAMiWC0H/vGo3lp7AtvDTWY+GDePrPfr+sqo1uX5koBex43/rRJymb0oIs9iWmWJ+U7p/aNdbtAqMnM9kKwwqDOhx+8byYEz5cfy3U5dN8+XAXpCgB07B+QrmM9VVbW1Q0dFZlb+rMNNADGEYJ0a0JpL6b4H8AvM9Cl1o+/XJQAAAABJRU5ErkJggg==">
						<h4>Theo dõi chu kỳ<br>Thống kê</h4>
					</div>
				</a>
			</div>				
		</div>
	</div>
@stop