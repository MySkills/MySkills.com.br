<h2>Available Documentation</h2>
<ul>
@foreach ($bundles as $bundle)
	<li><a href="{{ URL::to('/bundocs/'.$bundle.'/home') }}">{{ Str::title($bundle) }}</a></li>
@endforeach
</ul>