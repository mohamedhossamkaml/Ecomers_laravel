<span class="label
{{ $level == 'user'?'label-info':'' }}
{{ $level == 'company'?'label-success':'' }}
{{ $level == 'vendor'?'label-primary':'' }}
" >

    {{ atrans($level) }}
</span>