# Acc
Admin: admin@gmail.com
pass: admin

# 1	
	Ngân hàng: NCB
	Số thẻ: 9704198526191432198
	Tên chủ thẻ:NGUYEN VAN A
	Ngày phát hành:07/15
	Mật khẩu OTP: 123456
=> Thành công

# 2	
	Ngân hàng: NCB
	Số thẻ: 9704195798459170488
	Tên chủ thẻ:NGUYEN VAN A
	Ngày phát hành: 07/15
=> Thẻ không đủ số dư

# Mô hình MVC tổ chức các lớp/đối tượng trong chương trình vào một trong 3 danh mục chính:
- Model: dữ liệu, thao tác/xử lý trên dữ liệu (business logic), các quy luật, quy tắc trong lĩnh vực ứng dụng,...
− View: trình bày, hiển thị dữ liệu và thông thường có các thành phần giao diện cho phép người dùng hiệu chỉnh dữ liệu
− Controller:
	Điều khiển cho phép dữ liệu di chuyển giữa view và model
	Thành phần trung gian, liên kết view và model

# //---- htacess -----//
dùng mod_rewrite để chuyển hướng yêu cầu đến index.php
RewriteCond: thực thi RewriteRule kế tiếp nếu điều kiện đúng
RewriteRule: định nghĩa cách thay đổi URL
	^(.+)$ khớp bất kỳ URL nào ngoại trừ /
	^(.+)$ /index.php: chuyển URL tương ứng thành /index.php
	QSA: nếu URL chứa chuỗi truy vấn, nối chuỗi truy vấn đó vào index.php
	L: đây là RewriteRule cuối cùng, không xử lý các RewriteRule phía sau


