@if (Session::has('danger'))
    <div class="flash alert alert-danger">{{ Session::get('danger') }}</div>
@endif
@if ($errors->any())
<div class="flash alert alert-danger">
    <b>Errors</b>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::has('warning'))
    <div class="flash alert alert-warning">{{ Session::get('warning') }}</div>
@endif
@if (Session::has('success'))
    <div class="flash alert alert-success">{{ Session::get('success') }}</div>
@endif
@if (Session::has('info'))
    <div class="flash alert alert-info">{{ Session::get('info') }}</div>
@endif
<script>
    setTimeout(() => {
    $('.flash').fadeOut();
    }, 2000);
</script>