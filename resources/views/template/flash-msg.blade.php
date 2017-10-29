<script>
    @if(Session::has('flash_msg_success'))
    $.toast({
        heading: '{!! session('flash_msg_success')['title'] !!}',
        text: '{!! session('flash_msg_success')['text'] !!}',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'success',
        hideAfter: 3500,
        stack: 6
    });
    @endif

    @if(Session::has('flash_msg_danger'))
    $.toast({
        heading: '{!! session('flash_msg_danger')['title'] !!}',
        text: '{!! session('flash_msg_danger')['text'] !!}',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'error',
        hideAfter: 3500

    });
    @endif

    @if(Session::has('flash_msg_warning'))
    $.toast({
        heading: '{!! session('flash_msg_warning')['title'] !!}',
        text: '{!! session('flash_msg_warning')['text'] !!}',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3500,
        stack: 6
    });
    @endif

    @if(Session::has('flash_msg_info'))
    $.toast({
        heading: '{!! session('flash_msg_info')['title'] !!}',
        text: '{!! session('flash_msg_info')['text'] !!}',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'info',
        hideAfter: 3000,
        stack: 6
    });
    @endif
</script>