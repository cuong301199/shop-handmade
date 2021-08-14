<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
    <form action="{{Route('loaisanpham.add')}}" method="post">
        
        @csrf
            <div class="form-group">
              
                <label for="">Tên loại sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="tenLoaiSanPham" placeholder="Ten loại sản phẩm">
                <br>
                <label for="">Danh mục</label>
              
                <select name="tenDanhMuc">
                    {{$stt=1}}
                @foreach($danhsach as $item => $key)
               

                    <option value="{{$key->id}}">{{$key->ten_dm}}</option>
                    <!-- <option value="4">Nhà Cửa</option>
                    <option value="5">Quần áo và giày</option>
                    <option value="6">Đồ chơi và giải trí</option> -->

                    @endforeach
                </select>
             
               
            </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>