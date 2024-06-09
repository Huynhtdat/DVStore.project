<div class="container_fullwidth content-page">
    <div class="container">
        <div class="col-md-12 container-page">
            <div class="checkout-page">
                <ol class="checkout-steps">
                    <li class="steps active">
                        <h4 class="title-steps text-center">
                            Xác Thực Tài Khoản
                        </h4>
                        <div class="step-description">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="run-customer">
                                        <form action="{{ route('user.resend_email') }}" method="POST" id="login-form__js">
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                            <p class="text-center text-notification">
                                                Chúng tôi đã gởi một liên kết xác nhận đến địa chỉ email {{ $user->email }} của bạn. Vui lòng xác thực tài khoản để tiếp tục sử dụng dịch vụ. Nếu bạn không nhận được liên kết, vui lòng nhấn nút bên dưới để được gửi lại.
                                            </p>
                                            @if (session('status') == 'verification-link-sent')
                                                <p class="text-success text-notification text-center">
                                                    Một liên kết xác nhận mới đã được gửi đến địa chỉ email của bạn.
                                                </p>
                                            @endif
                                            @csrf
                                            <div class="text-center">
                                                <button class="btn btn-success">Gửi lại liên kết</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

