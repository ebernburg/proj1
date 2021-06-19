@section('custom_css')
    <style>
        .popup-fade {
            display: none;
        }
        .popup-fade:before {
            content: '';
            background: #000;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0.7;
            z-index: 9999;
        }
        .popup {
            position: fixed;
            top: 20%;
            left: 50%;
            padding: 20px;
            width: 360px;
            margin-left: -200px;
            background: #fff;
            border: 1px solid orange;
            border-radius: 4px;
            z-index: 99999;
            opacity: 1;
        }
        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@endsection

@section('custom_js')
<script>
    $('.ask__btn').on('click', function () {
         //alert(1)
        event.preventDefault()
        let block = $(this).closest("div.ask__form"); //parent div
        let input_name = $(this).closest("div.ask__form").find("input.name").val(); // value of input name
        console.log(input_name)
        let input_email  = $(this).closest("div.ask__form").find("input.email").val(); // value of input email
        console.log(input_email)
        let textarea  = $(this).closest("div.ask__form").find("textarea.textarea").val(); // value of textarea
        console.log(textarea)

        $.ajax({
            type: 'post',
            url: '{{route("frontend.contact_form")}}',
            data: {
                "_token": "{{ csrf_token() }}",
                name: input_name,
                email: input_name,
                textarea : textarea
            },
            dataType: "json",
            success: function (data) {
                $('.name').val('')
                $('.email').val('');
                $('.textarea').val('');

                getModalWindow();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>

<script>
    function getModalWindow() {
        $('.popup-fade').fadeIn();
            $('.sign_for_order').click(function () {
                $('.popup-fade').fadeIn();
                return false;
            });

            $('.popup-close').click(function () {
                $(this).parents('.popup-fade').fadeOut();
                $('.link-visible').css('visibility', 'visible');
                return false;
            });

            $(document).keydown(function (e) {
                if (e.keyCode === 27) {
                    e.stopPropagation();
                    $('.popup-fade').fadeOut();

                }
            });

            $('.popup-fade').click(function (e) {
                if ($(e.target).closest('.popup').length == 0) {
                    $(this).fadeOut();
                    $('.link-visible').css('visibility', 'visible');
                }
            });
    }
</script>
@endsection

<!-- Modal window -->
<div class="popup-fade">
    <div class="popup">
        <a class="popup-close" href="#">{{_t('Close')}}</a>
        <h3 style="color: red">{{_t('Your question sent')}}</h3>
{{--        <button class="btn btn-success text-white"><a style="color: white" href="{{route('login')}}">Login</a></button>--}}
{{--        <button class="btn btn-success text-white"><a style="color: white" href="{{route('register')}}">Register</a></button>--}}
    </div>
</div>
<!-- ./Modal window -->


<!-- Block Have you questions -->
<div class="container-fluid questions pb-5" style="background-image: url('https://i.pinimg.com/originals/fe/88/c3/fe88c30a003fb353dcd6ae4c9cd9bb87.jpg');
background-size: cover">
    <div class="title"><h2 class="title__name">{{_t('DO YOU HAVE ANY QUESTIONS')}} ?</h2>
        <p class="title__subtitle">{{_t('Send them to our manager')}}</p>
    </div>
    <div class="ask__form">
{{--        <form action="{{route('frontend.contact_form')}}" method="POST" id="contact-form" enctype="multipart/form-data">--}}
{{--              onsubmit="window.dataLayer = window.dataLayer || [];dataLayer.push({'event': 'AskForm'});">--}}
{{--            @csrf--}}
            <div class="row">
                <div class="col-md-6"><label class="form__item"><input type="text" name="name" placeholder="Name"
                                                                       required="required" class="input name"></label> <label
                        class="form__item"><input type="email" name="email" placeholder="E-mail" required="required"
                                                  class="input email"></label></div>
                <div class="col-md-6">
                    <div class="form__item"><textarea name="message" placeholder="Text" required="required"
                                                      class="input input__textarea textarea"></textarea></div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn__primary ask__btn">{{_t('Ask')}}</button>
            </div>
{{--        </form>--}}
    </div>
</div>


