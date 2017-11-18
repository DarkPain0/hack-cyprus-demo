<script>
    $(function () {
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //tooltips
        $('[data-toggle="tooltip"]').tooltip();
        //popovers
        $('[data-toggle="popover"]').popover();

        //panels collapsible
        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
        });

        //notifications
        @if (session()->has('success'))
        window.toastr.success("{!! session()->get('success') !!}");
        @endif
        @if (session()->has('info'))
        window.toastr.message("{!! session()->get('info') !!}");
        @endif
        @if (session()->has('warning'))
        window.toastr.warning("{!! session()->get('warning') !!}");
        @endif
        @if (session()->has('error'))
        window.toastr.error("{!! session()->get('error') !!}", 0);
        @endif
        @if (session()->has('highlight'))
        //highlight new-updated rows
        $("#row" + "{!! session()->get('highlight') !!}").addClass('highlight');
        @endif
    });
</script>
