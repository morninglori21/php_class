<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName = 'register';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    form .form-group small.error {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">會員註冊</h5>

                    <form name="form1" method="post" novalidate onsubmit="checkForm(); return false;">

                        <div class="form-group">
                            <label for="email">** email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <small class="form-text error"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">** 密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="form-text error"></small>
                        </div>
                        <div class="form-group">
                            <label for="nickname">** 暱稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" required>
                            <small class="form-text error"></small>
                        </div>

                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text error"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">註冊</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $nickname = $('#nickname'),
        $email = $('#email'),
        $password = $('#password');
    const fileds = [$nickname, $email, $password];

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if ($nickname.val().length < 2) {
            isPass = false;
            $nickname.css('border', '1px solid red');
            $nickname.next().text('請輸入至少兩位數暱稱');
        }

        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }

        if ($password.val().length < 8) {
            isPass = false;
            $password.css('border', '1px solid red');
            $password.next().text('請輸入至少八位數的密碼');
        }
        // if(! mobile_re.test($mobile.val())){
        //     isPass = false;
        //     $mobile.css('border', '1px solid red');
        //     $mobile.next().text('請輸入正確的手機號碼');
        // }

        if (isPass) {
            $.post(
                'register-api.php',
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        alert('註冊成功');
                        location.href = './'; //導回首頁
                    } else {
                        alert(data.error);
                    }
                },
                'json'
            )
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>