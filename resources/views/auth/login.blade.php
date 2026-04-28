
    <style>
        body {
            margin: 0;
            font-family: 'Jost', sans-serif;
            background: #f7f8fb;
        }

        .login-bg {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .loginouter {
            max-width: 890px;
            margin: 10% auto 0;
            background: #fff;
            box-shadow: 0 2px 30px #ccc6;
            font-size: 13px;
        }

        .sectionpadding {
            padding: 50px;
        }

        .login-logo {
            height: 35px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .sublinehead {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        #loginForm {
            margin-top: 20px;
        }

        .form-control {
            margin-bottom: 8px;
            padding: 10px 15px;
            font-size: 14px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .btn-primary {
            width: 100%;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            margin-top: 10px;
            background: #0d6efd;
            border: 0;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .text-danger {
            color: #dc3545;
            font-size: 12px;
        }

        .rightbox {
            border-left: 2px solid #f1f1f1;
            text-align: center;
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #555;
        }

        .forgot-link {
            font-size: 13px;
            color: #0d6efd;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .loginouter {
                margin: 30px 15px;
            }

            .sectionpadding {
                padding: 30px 22px;
            }

            .rightbox {
                display: none;
            }
        }
    </style>

    <img src="{{ asset('assets/images/loginbg.png') }}" class="login-bg" alt="Login Background">

    <div class="loginouter">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="60%">
                    <div class="sectionpadding">

                        <div>
                            <img src="{{ asset('assets/images/profilepic/16942404066793789211693635606.jpg') }}" class="login-logo" alt="Logo">
                        </div>

                        <h1>Sign in</h1>
                        <div class="sublinehead">to access your account</div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form id="loginForm" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-group">
                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    placeholder="Email Address"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                >

                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    required
                                    autocomplete="current-password"
                                >

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember + Forgot -->
                            <div class="remember-row">
                                <label for="remember_me">
                                    <input id="remember_me" name="remember" type="checkbox">
                                    Remember me
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-link">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn-primary">
                                Login
                            </button>
                        </form>

                    </div>
                </td>

                <td class="rightbox">
                    <div class="sectionpadding">
                        <img src="{{ asset('assets/images/crmimgright.jpg') }}" height="200" alt="CRM Image">

                        <div style="font-size:11px; color:#666666; margin-top:15px;">
                            by Trekhops
                        </div>

                        <div style="font-size:11px; color:#999;">
                            {{ request()->ip() }}
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
