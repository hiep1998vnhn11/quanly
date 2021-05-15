@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Bookings</li>
    </ol>
    <div class="box_general">
        <div class="header_box">
            <h2 class="d-inline-block">Bookings List</h2>
            <div class="filter">
                <select name="orderby" class="selectbox">
                    <option value="Any status">Any status</option>
                    <option value="Approved">Approved</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="list_general">
            <ul>
                <li>
                    <figure><img src="img/avatar1.jpg" alt=""></figure>
                    <h4>Enzo Ferrari <i class="pending">Pending</i></h4>
                    <ul class="booking_details">
                        <li><strong>Booking date</strong> 11 November 2017</li>
                        <li><strong>Booking time</strong> 10.20AM</li>
                        <li><strong>Visits</strong> Cardiology test, Diabetic diagnose</li>
                        <li><strong>Telephone</strong> 0043 432324</li>
                        <li><strong>Email</strong> user@email.com</li>
                    </ul>
                    <ul class="buttons">
                        <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                        </li>
                        <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <figure><img src="img/avatar2.jpg" alt=""></figure>
                    <h4>Andrea Lomarco <i class="cancel">Cancel</i></h4>
                    <ul class="booking_details">
                        <li><strong>Booking date</strong> 11 November 2017</li>
                        <li><strong>Booking time</strong> 10.20AM</li>
                        <li><strong>Visits</strong> Cardiology test, Diabetic diagnose</li>
                        <li><strong>Telephone</strong> 0043 432324</li>
                        <li><strong>Email</strong> user@email.com</li>
                    </ul>
                    <ul class="buttons">
                        <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                        </li>
                        <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <figure><img src="img/avatar3.jpg" alt=""></figure>
                    <h4>Marc Twain <i class="approved">Approved</i></h4>
                    <ul class="booking_details">
                        <li><strong>Booking date</strong> 11 November 2017</li>
                        <li><strong>Booking time</strong> 10.20AM</li>
                        <li><strong>Visits</strong> Cardiology test, Diabetic diagnose</li>
                        <li><strong>Telephone</strong> 0043 432324</li>
                        <li><strong>Email</strong> user@email.com</li>
                    </ul>
                    <ul class="buttons">
                        <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                        </li>
                        <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection
