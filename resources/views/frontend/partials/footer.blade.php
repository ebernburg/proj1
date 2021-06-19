
@push('script2')
    <script>
        function uniqid(length){
            var dec2hex = [];
            for (var i=0; i<=15; i++) {
                dec2hex[i] = i.toString(16);
            }

            var uuid = '';
            for (var i=1; i<=36; i++) {
                if (i===9 || i===14 || i===19 || i===24) {
                    uuid += '-';
                } else if (i===15) {
                    uuid += 4;
                } else if (i===20) {
                    uuid += dec2hex[(Math.random()*4|0 + 8)];
                } else {
                    uuid += dec2hex[(Math.random()*16|0)];
                }
            }

            if(length) uuid = uuid.substring(0,length);
            return uuid;
        }
    </script>
<script>
    $(document).ready(function () {
        $('.js-btn-ok').on('click', function () {
            //alert(1)
            //console.log(uniqid)
            //alert(uniqid)
            $:uniqid = uniqid(9);
             document.cookie = "user-cookies=" + uniqid +";path=/";
            document.cookie = "cart_id="+ uniqid +";path=/";
            $.ajax({
                type: 'get',
                url: '{{ route("frontend.cookies") }}',
                data: {
                    "_token": "{{ csrf_token() }}",

                },
                dataType: "json",
                success: function (data) {
                     //console.log(1);
                     //alert(1);
                     $('.cc-banner').css('display', 'none');
                     $('.wrapper-page').removeClass();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
    })
</script>

@endpush

<div class="container2">
    <div class="flex-row fixed-bottom navbar-dark bg-dark shadow-sm">
        <footer class="d-flex justify-content-center">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link mr-5 ml-5">2021 Andrii Adamchuk</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
        </footer>
    </div>
</div>

