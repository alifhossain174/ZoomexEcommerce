@extends('master')

@section('content')
    <!-- Start of Main -->
    <main class="main" style="background: #fff">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Vendor Register</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="vendor-register.html">Vendor Register</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Vendor Register -->
        <div class="vendor-register">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <form class="vendor-register-form" action="#" method="post">
                            <div class="v-register-form-widget">
                                <h4>Business Information:</h4>
                                <div class="form-group">
                                    <label>Business Name *</label>
                                    <input type="text" class="form-control" name="businessname" id="businessname"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Business Category *</label>
                                    <div class="select-box">
                                        <select id="multiple-checkboxes" multiple="multiple">
                                            <option value="1">Apparel and Accessories</option>
                                            <option value="2">Automotive</option>
                                            <option value="3">Baby and Toddler</option>
                                            <option value="4">Beauty and Personal Care</option>
                                            <option value="5">Books and Media</option>
                                            <option value="6">Electronics</option>
                                            <option value="7">Food and Beverage</option>
                                            <option value="8">Furniture</option>
                                            <option value="9">Home Appliances</option>
                                            <option value="10">Jewelry and Watches</option>
                                            <option value="11">Kitchen and Dining</option>
                                            <option value="12">Office Supplies</option>
                                            <option value="13">Pet Supplies</option>
                                            <option value="14">Sporting Goods and Outdoor</option>
                                            <option value="15">Toys and Games</option>
                                            <option value="16">Travel and Luggage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Business Trade License Number *</label>
                                    <input type="text" class="form-control" name="tradelicense" id="tradelicense"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Business Address *</label>
                                    <input type="text" class="form-control" name="businessaddress" id="businessaddress"
                                        required />
                                </div>
                            </div>

                            <div class="v-register-form-widget">
                                <h4>Owner Information:</h4>
                                <div class="form-group">
                                    <label>Full name *</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" required />
                                </div>
                                <div class="form-group">
                                    <label>Phone Number *</label>
                                    <input type="tel" class="form-control" name="phonenumber" id="phonenumber"
                                        required />
                                </div>

                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <input type="email" class="form-control" name="email" id="email" required />
                                </div>

                                <div class="form-group">
                                    <label>Login Password *</label>

                                    <div class="form-inpiut-icon">
                                        <input type="password" class="form-control" name="password" id="password"
                                            required />
                                        <i class="fa fa-eye-slash" id="togglePassword"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="v-register-form-widget">
                                <h4>Attachment:</h4>
                                <div class="form-group">
                                    <label> Upload Owner NID card</label>
                                    <div class="v-register-upload">
                                        <div class="create-ticket-form-upload-image">
                                            <div class="library-photo-input">
                                                <input type="file" accept="image/*" id="library-photo-input1"
                                                    class="hidden" multiple onchange="uploadLibraryPhoto(event, 1)" />
                                                <label for="library-photo-input1">
                                                    <!-- Update for attribute accordingly -->
                                                    <i class="fa fa-camera"></i>
                                                    <span>Upload NID</span>
                                                </label>
                                            </div>
                                            <div class="upload-image-list upload-img-input" id="upload-image-list1">
                                                <div style="position: relative">
                                                    <div class="remove-icon" style="display: none" onclick="removeImage(1)">
                                                        <i class="fa fa-cross"></i>
                                                    </div>
                                                    <img id="uploaded-image1" style="display: none" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Upload Business Trade License</label>
                                    <div class="v-register-upload">
                                        <div class="create-ticket-form-upload-image">
                                            <div class="library-photo-input">
                                                <input type="file" accept="image/files*" id="library-photo-input2"
                                                    class="hidden" multiple onchange="uploadLibraryPhoto(event, 2)" />
                                                <label for="library-photo-input2">
                                                    <!-- Update for attribute accordingly -->
                                                    <i class="fa fa-file-alt"></i>
                                                    <span>Upload Trade License</span>
                                                </label>
                                            </div>
                                            <div class="upload-image-list upload-img-input" id="upload-image-list2">
                                                <div style="position: relative">
                                                    <div class="remove-icon" style="display: none"
                                                        onclick="removeImage(2)">
                                                        <i class="fa fa-cross"></i>
                                                    </div>
                                                    <img id="uploaded-image2" style="display: none" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-radio">
                                    <input type="checkbox" id="local-pickup" class="custom-control-input"
                                        name="shipping" />
                                    <label for="local-pickup" class="custom-control-label color-dark pl-2">I have read and
                                        agree to the Terms & Conditions</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Vendor Register -->
    </main>
    <!-- End of Main -->
@endsection
