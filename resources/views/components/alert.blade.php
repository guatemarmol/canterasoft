<div class="alert alert-{{ $class }} alert-dismissible" data-dismiss="alert" role="alert"
x-init="clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 100000); "
 x-show.transition.opacity.out.duration.15500ms="shown"
 >
    <em class="fa fa-lg fa-warning">
    </em>
    <strong>
        {{ $name }}!
    </strong>
    {{ $message }}

</div>
