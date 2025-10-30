{{-- Place page-specific scripts or stacks here --}}
@stack('scripts')

{{-- Chart.js CDN & styles (kept same behaviour as original layout) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

{{-- Project local scripts used in assets folder --}}
<script src="{{ asset('assets/js/init-alpine.js') }}" defer></script>
<script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
<script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
