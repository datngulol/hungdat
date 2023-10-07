<!DOCTYPE html>
<html>
<head>
    <title>Trang Liên Hệ</title>
    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if(session('message'))
		<div class="alert alert-success">
				{{ session('message') }}
		</div>
		@endif
        <form action="{{route('postContactMail')}}" method="post">
            @csrf
            <h1 class="mt-5">Liên Hệ</h1>
            <p>Hãy điền vào biểu mẫu bên dưới để liên hệ với chúng tôi:</p>
            <div class="form-group">
                <label for="ten">Tên của bạn:</label>
                <input type="text" class="form-control" id="ten" name="name">
            </div>
            <div class="form-group">
                <label for="email">Tiêu đề:</label>
                <input type="text" class="form-control" id="email" name="subject">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <div class="form-group">
                <label for="tinhnang">Tin nhắn:</label>
                <input type="text" class="form-control" id="tinnhan" name="message">
                <!-- <textarea class="form-control" id="tinhnang" name="tinhnang" rows="4" ></textarea> -->
            </div>
            
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>

    <!-- Sử dụng Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
