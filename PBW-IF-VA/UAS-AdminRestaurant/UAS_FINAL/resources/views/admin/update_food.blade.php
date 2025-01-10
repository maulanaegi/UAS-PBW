<!DOCTYPE html>
<html>
    <head> 
        <base href="/public">

        @include('admin.css')

        <style>
            .div_deg {
                padding: 10px;
            }

            label {
                display: inline-block;
                width: 200px;
            }
        </style>
    </head>
    <body>

        @include('admin.header')

        @include('admin.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1>Update Food</h1>
                    <form action="{{ route('update_food', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_deg">
                            <label for="title">Food Title</label>
                            <input type="text" name="title" value="{{ $data->title }}" required>
                        </div>
                    
                        <div class="div_deg">
                            <label for="details">Details</label>
                            <textarea name="details" required>{{ $data->detail }}</textarea>
                        </div>
                    
                        <div class="div_deg">
                            <label for="price">Price</label>
                            <input type="text" name="price" value="{{ $data->price }}" required>
                        </div>
                    
                        <div class="div_deg">
                            <label for="current_image">Current Image</label>
                            <img width="150" src="food_img/{{ $data->image }}" alt="Food Image">
                        </div>
                    
                        <div class="div_deg">
                            <label for="img">Change Image</label>
                            <input type="file" name="img">
                        </div>
                    
                        <div class="div_deg">
                            <!-- Gunakan button sebagai tombol submit -->
                            <button class="btn btn-warning" type="submit">Update Food</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('admin.js')
    </body>
</html>
