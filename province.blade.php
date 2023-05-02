@extends('layouts.back')
@section('content')
    <div class="container-fluid">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fs-16">
                <li class="breadcrumb-item "><a href="#" class="tc-2 fw-500 text-decoration-none">ตั้งค่า</a></li>
                <li class="breadcrumb-item active tc-2 fw-500" aria-current="page">จัดการจังหวัด</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col">

                <div class="card card-st-3 mb-4 "
                    style="background: #FFFFFF;border: 1px solid rgba(152, 152, 152, 0.53);border-radius: 15px;">
                    <div class="card-body py-lg-4 px-lg-5">

                        <div class="fs-24 fw-bold mb-4 pt-2">จัดการจังหวัด</div>
                        <div class="mb-4 pb-2">
                            <button class="btn btn-st-1 fs-18 px-4" style="width: 200px;" data-bs-toggle="modal"
                                data-bs-target="#createModal">เพิ่มจังหวัด</button>
                        </div>

                        <ul class="data-status d-flex">
                            <li>
                                <input type="radio" name="data-status" class="input-status" id="data-status-1"
                                    data-status="0" value="" checked="">
                                <label for="data-status-1" class="mb-0">ทั้งหมด (<span
                                        class="countStatus">{{ count($data) }}</span>)</label>
                            </li>
                            <li>
                                <input type="radio" name="data-status" class="input-status" id="data-status-2"
                                    data-status="1" value="เปิดใช้งาน">
                                <label for="data-status-2" class="mb-0">เปิดการใช้งาน (<span
                                        class="countStatus1">{{ $data->where('status' , 1)->count() }}</span>)</label>
                            </li>
                            <li>
                                <input type="radio" name="data-status" class="input-status" id="data-status-3"
                                    data-status="2" value=" ปิดใช้งาน">
                                <label for="data-status-3" class="mb-0">ปิดการใช้งาน (<span
                                        class="countStatus0">{{ $data->where('status' , 0)->count() }}</span>)</label>
                            </li>

                        </ul>
                        <div class="table-tools d-flex pb-1 flex-wrap align-items-center mb-3">

                            <button class="btn btn-st-11 btn-export  btn-control   me-3 mb-2 " id="ExportReporttoExcel">
                                <img src="{{asset('/backend/assets/images/icon/carbon_export.png')}}" class="mt-n1 me-2" width="24"> Export to
                                Excel
                            </button>


                            <div class="fs-16 text-color-8 mb-2  me-3">เลือกจากวันที่ทำรายการ</div>
                            <div class="mb-2 me-auto">
                                <input type="text" name="" id=""
                                    class="form-control form-st-2 icon-calendar-2 daterange "
                                    placeholder="dd/mm/yyyy -  dd/mm/yyyy" style="min-width: 250px;">
                            </div>
                            <div class="mb-2">
                                <input type="search" name="" id="search"
                                    class="form-control form-st-2 icon-search" placeholder="พิมพ์คำค้นหา"
                                    style="min-width: 240px;">
                            </div>
                        </div>
                        <table class="table" id="list-table">
                            <thead>
                                <tr>
                                    <th class="py-1 ">
                                        <div class="form-check form-check-st-1"
                                            style="padding-left: 25px;padding-top: 7px;">
                                            <input class="form-check-input" name="checkall" type="checkbox">
                                        </div>
                                    </th>
                                    <th class="py-1">
                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">รหัส</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                    </th>
                                    <th class="py-1 select2-filter">
                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">ชื่อจังหวัด</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                        <select class="form-control select2 select2-c2" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="py-1">

                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">จำนวนหมวดหมู่เล่ม</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                    </th>
                                    <th class="py-1">

                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">ยอดเข้าชม</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                    </th>
                                    <th class="py-1 select2-filter">
                                        <div class="fw-500">ผู้สร้าง</div>
                                        <select class="form-control select2 select2-c5" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="py-1 select2-filter fw-500">
                                        <div>ผู้แก้ไขล่าสุด</div>
                                        <select class="form-control select2 select2-c6" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="select2-filter fw-500 py-1">
                                        <div class="d-flex align-items-center justify-content-center ">
                                            <div class="me-2">สถานะ</div>
                                            <button class="btn btn-sort p-0 align-self-center asc"></button>
                                        </div>
                                        <select class="form-control select2 select2-c7" name="">
                                            <option value="">ทั้งหมด</option>
                                            <option value="0"> ปิดใช้งาน</option>
                                            <option value="1">เปิดใช้งาน</option>
                                        </select>
                                    </th>
                                    <th class="py-1 fw-500">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->isNotEmpty())
                                @foreach ($data as $value)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-st-1">
                                                <input class="form-check-input" name="check-input" type="checkbox" value="{{ $value->id }}" >
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#editModal"  class="alink-st-1 tc-4"  data-bs-toggle="modal" data-bs-nameTh="{{ $value->name_th }}" data-bs-nameEn="{{ $value->name_en }}" data-bs-id="{{ $value->id }}" data-bs-creatorDummy="{{ $value->createdBy->full_name() }}" data-bs-creator="{{ $value->created_by }}" data-bs-createDateDummy="{{ $value->created_at->thaidate('d/m/Y H:i') }}" data-bs-createDate="{{ $value->created_at }}" data-bs-editorDummy="{{ $value->updatedBy->full_name() }}" data-bs-editor="{{ $value->updated_by }}" data-bs-editDateDummy="{{ $value->updated_at->thaidate('d/m/Y H:i') }}" data-bs-editDate="{{ $value->updated_at }}" data-bs-bgImage="{{ asset('/backend/assets/images/'.$value->bg_image) }}" data-bs-status="{{ $value->status }}">
                                                {{ $value->code }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="fs-16">{{ $value->name_th }}</div>
                                            <div class="tc-3 fs-14">{{ $value->name_en }}</div>

                                        </td>
                                        <td></td>
                                        <td>{{ $value->views }}</td>
                                        <td>
                                            <div>{{ $value->createdBy->full_name() }}</div>
                                            <div class="tc-3 fs-14 mt-1">{{ $value->created_at->thaidate('d/m/Y H:i') }} </div>
                                        </td>
                                        <td>
                                            <div>{{ $value->updatedBy->full_name() }}</div>
                                            <div class="tc-3 fs-14 mt-1">{{ $value->updated_at->thaidate('d/m/Y H:i') }}</div>
                                        </td>
                                        <td>
                                            @if ($value->status == 0)
                                                <div class="switch-usage-status">
                                                    <input type="checkbox" name="" class="hide-input" id="check{{ $value->id }}" value="{{ $value->id }}">
                                                    <label for="check{{ $value->id }}">
                                                        <div class=""> ปิดใช้งาน</div>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="switch-usage-status">
                                                    <input type="checkbox" name="" class="hide-input" id="check{{ $value->id }}" value="{{ $value->id }}" checked>
                                                    <label for="check{{ $value->id }}">
                                                        <div class="">เปิดใช้งาน</div>
                                                    </label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-table-edit-st-1  btn-delete"  data-bs-target="#editModal" data-bs-toggle="modal" data-bs-nameTh="{{ $value->name_th }}" data-bs-nameEn="{{ $value->name_en }}" data-bs-id="{{ $value->id }}" data-bs-creatorDummy="{{ $value->createdBy->full_name() }}" data-bs-creator="{{ $value->created_by }}" data-bs-createDateDummy="{{ $value->created_at->thaidate('d/m/Y H:i') }}" data-bs-createDate="{{ $value->created_at }}" data-bs-editorDummy="{{ $value->updatedBy->full_name() }}" data-bs-editor="{{ $value->updated_by }}" data-bs-editDateDummy="{{ $value->updated_at->thaidate('d/m/Y H:i') }}" data-bs-editDate="{{ $value->updated_at }}" data-bs-bgImage="{{ asset('/backend/assets/images/'.$value->bg_image) }}"  data-bs-status="{{ $value->status }}"></button>
                                            <a>
                                                <button class="btn btn-table-delete-st-1 ms-0 btn-delete" data-id="{{ $value->id }}">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@once
    @push('modal')
        <div class="modal fade modal-st-1" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-md">
                <div class="modal-content pt-3">
                    <form class="  needs-validation" id="createForm" novalidate>

                        <div class="modal-body px-5 pt-4 pb-3">
                            <div class="tx-1 mb-4">เพิ่มจังหวัด</div>
                            <div class="py-1"></div>

                            <div class="mb-3">
                                <label class="mb-2">ชื่อจังหวัด (TH) <span class="text-danger">*</span></label>
                                <input type="" name="nameTh" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ชื่อจังหวัด (EN) <span class="text-danger">*</span></label>
                                <input type="" name="nameEn" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ผู้สร้าง</label>
                                <input type="" name="creator" class="form-control" required="" readonly=""
                                    value="ว่าที่ ร.ต. เทวินทร์ ทุมประเสน">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">วันที่สร้าง</label>
                                <input type="" name="createDate" class="form-control" required="" readonly=""
                                    value="01/01/2565 12:12">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ผู้แก้ไขล่าสุด </label>
                                <input type="" name="editor" class="form-control" required="" readonly="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">วันที่แก้ไขล่าสุด</label>
                                <input type="" name="editDate" class="form-control" required="" readonly="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ภาพพื้นหลัง <span class="tc-3 fs-14">(ขนาดแนะนำ 1920x321
                                        px)</span></label>
                                <div class="bx-fileupload">
                                    <input type="file" name="bgImage" class="hide-input input-fileupload ">
                                    <div class="bx-fileupload-wrapper">
                                        <div class="fs-20 mb-2 tc-2 fw-500">click to upload</div>
                                        <div class="tc-3 fs-14">(ขนาดแนะนำ 1920x321 px)</div>
                                    </div>
                                    <div class="bx-fileupload-preview"><img src=""></div>
                                    <button class="btn btn-table-delete-st-1 btn-delete-file" type="button"></button>

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center pt-1">
                                    <div class="tc-6 fs-16 me-3">สถานะ :</div>
                                    <div>
                                        <div class="switch-usage-status-sigle">
                                            <input type="checkbox" name="status" class="hide-input" id="status"
                                                value="" checked="">
                                            <label for="status"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center py-2">
                                <button type="button" class="btn btn-st-3 ms-2 p-1 lh-lg fw-500 fs-18 mx-2"
                                    style="width: 114px;min-width: 114px;" data-bs-dismiss="modal">ยกเลิก</button>
                                <button class="btn btn-st-2 ms-2 p-1 lh-lg fw-500 fs-18  mx-2"
                                    style="width: 114px;min-width: 114px;">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade modal-st-1" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-md">
                <div class="modal-content pt-3">
                    <form class="  needs-validation" id="editForm" novalidate>

                        <div class="modal-body px-5 pt-4 pb-3">
                            <div class="tx-1 mb-4">แก้ไขจังหวัด</div>
                            <div class="py-1"></div>

                            <div class="mb-3">
                                <label class="mb-2">ชื่อจังหวัด (TH) <span class="text-danger">*</span></label>
                                <input type="text" name="nameTh" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ชื่อจังหวัด (EN) <span class="text-danger">*</span></label>
                                <input type="text" name="nameEn" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ผู้สร้าง</label>
                                <input type="text" name="creatorDummy" class="form-control" readonly value="">
                                <input type="hidden" name="creator" class="form-control" required="" readonly="" value="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">วันที่สร้าง</label>
                                <input type="text" name="createDateDummy" class="form-control" required="" readonly="" value="">
                                <input type="hidden" name="createDate" class="form-control" required="" readonly="" value="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ผู้แก้ไขล่าสุด </label>
                                <input type="text" name="editorDummy" class="form-control" required="" readonly="">
                                <input type="hidden" name="editor" class="form-control" required="" readonly="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">วันที่แก้ไขล่าสุด</label>
                                <input type="text" name="editDateDummy" class="form-control" required="" readonly="">
                                <input type="hidden" name="editDate" class="form-control" required="" readonly="">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">ภาพพื้นหลัง <span class="tc-3 fs-14">(ขนาดแนะนำ 1920x321
                                        px)</span></label>
                                <div class="bx-fileupload">
                                    <input type="file" name="bgImage" class="hide-input input-fileupload ">
                                    <div class="bx-fileupload-wrapper">
                                        <div class="fs-20 mb-2 tc-2 fw-500">click to upload</div>
                                        <div class="tc-3 fs-14">(ขนาดแนะนำ 1920x321 px)</div>
                                    </div>
                                    <div class="bx-fileupload-preview"><img src=""></div>
                                    <button class="btn btn-table-delete-st-1 btn-delete-file" type="button"></button>

                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-1">
                                <div class="tc-6 fs-16 me-3">สถานะ :</div>
                                <div>
                                    <div class="switch-usage-status-sigle">
                                        <input type="checkbox" name="status" class="hide-input" id="status"
                                            value="">
                                        <label for="status"></label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id">
                        </div>
                        <div class="modal-footer justify-content-start">
                            <div class="text-center d-flex align-items-center py-2 w-100">
                                <button type="button" class="btn btn-delete-st-2 me-auto"
                                    id="btnModal-delete">ลบข้อมูล</button>
                                <button type="button" class="btn btn-st-3 ms-2 p-1 lh-lg fw-500 fs-18 mx-2"
                                    style="width: 114px;min-width: 114px;" data-bs-dismiss="modal">ยกเลิก</button>
                                <button class="btn btn-st-2 ms-2 p-1 lh-lg fw-500 fs-18  mx-2"
                                    style="width: 114px;min-width: 114px;">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-st-1" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-sm">
                <div class="modal-content py-4">

                    <div class="text-center pb-3">
                        <div class="mb-4">
                            <svg width="112" height="112" viewBox="0 0 112 112" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M49.4673 64.4007L39.3173 54.2506C38.4618 53.3951 37.4118 52.9673 36.1673 52.9673C34.9229 52.9673 33.834 53.434 32.9007 54.3673C32.0451 55.2229 31.6173 56.3118 31.6173 57.634C31.6173 58.9562 32.0451 60.0451 32.9007 60.9007L46.2006 74.2006C47.0562 75.0562 48.1451 75.484 49.4673 75.484C50.7895 75.484 51.8784 75.0562 52.734 74.2006L79.2173 47.7173C80.0729 46.8618 80.5006 45.8118 80.5006 44.5673C80.5006 43.3229 80.034 42.234 79.1007 41.3007C78.2451 40.4451 77.1562 40.0173 75.834 40.0173C74.5118 40.0173 73.4229 40.4451 72.5673 41.3007L49.4673 64.4007ZM56.0006 102.667C49.5451 102.667 43.4784 101.442 37.8007 98.99C32.1229 96.5415 27.184 93.2173 22.984 89.0173C18.784 84.8173 15.4598 79.8784 13.0113 74.2006C10.5598 68.5229 9.33398 62.4562 9.33398 56.0006C9.33398 49.5451 10.5598 43.4784 13.0113 37.8007C15.4598 32.1229 18.784 27.184 22.984 22.984C27.184 18.784 32.1229 15.4582 37.8007 13.0067C43.4784 10.5582 49.5451 9.33398 56.0006 9.33398C62.4562 9.33398 68.5229 10.5582 74.2006 13.0067C79.8784 15.4582 84.8173 18.784 89.0173 22.984C93.2173 27.184 96.5415 32.1229 98.99 37.8007C101.442 43.4784 102.667 49.5451 102.667 56.0006C102.667 62.4562 101.442 68.5229 98.99 74.2006C96.5415 79.8784 93.2173 84.8173 89.0173 89.0173C84.8173 93.2173 79.8784 96.5415 74.2006 98.99C68.5229 101.442 62.4562 102.667 56.0006 102.667Z"
                                    fill="#3DD598" />
                            </svg>
                        </div>
                        <button class="btn btn-st-5" data-bs-dismiss="modal">บันทึกรายการสำเร็จ</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush
@endonce

@once
    @push('script')
        <script type="text/javascript">
            $(function() {
                var start = moment().subtract(0, 'days');
                var end = moment();

                function cb(start, end) {

                    // console.log(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'))
                }
                $('.daterange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    autoUpdateInput: false,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                }, cb);
                cb(start, end);


                $('.daterange').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                        'MM/DD/YYYY'));
                });

                $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2({
                    minimumResultsForSearch: -1,
                    "language": {
                        "noResults": function() {
                            return '<div class="fs-12 py-2">ไม่พบข้อมูล</div>';
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });
            });
        </script>

        <script type="text/javascript">
            // var myData4 = [{
            //         "id": 1,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 1,
            //     },
            //     {
            //         "id": 2,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 1,
            //     },
            //     {
            //         "id": 3,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "3",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 1,
            //     },
            //     {
            //         "id": 4,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 1,
            //     },
            //     {
            //         "id": 5,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 0,
            //     },
            //     {
            //         "id": 6,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 0,
            //     },
            //     {
            //         "id": 7,
            //         "code": "CATM001",
            //         "name": {
            //             "th": "กาญจนบุรี",
            //             "en": "Kanchanaburi"
            //         },
            //         "catalog_qty": "4",
            //         "views": "5,146",
            //         "creator": "นาย อัมฤทธิ์ จานุวี",
            //         "create_date": "01/01/2565 12:12",
            //         "editor": "นาย อัมฤทธิ์ จานุวี",
            //         "edit_date": "01/01/2566 12:12",
            //         "bg_image": "assets/images/bg3.png",
            //         "status": 1,
            //     },


            // ];


            var table = $('#list-table').DataTable({
                scrollX: true,
                scrollCollapse: true,
                sPaginationType: "listbox",
                // data: myData4,
                // columns: [{
                //         data: 'id'
                //     },
                //     {
                //         data: 'code'
                //     },
                //     {
                //         data: 'name'
                //     },
                //     {
                //         data: 'catalog_qty'
                //     },
                //     {
                //         data: 'views'
                //     },
                //     {
                //         data: 'creator'
                //     },
                //     {
                //         data: 'editor'
                //     },
                //     {
                //         data: 'status'
                //     },
                //     {
                //         data: 'id'
                //     }
                // ],
                columnDefs: [

                    {
                        targets: [0],
                        className: "text-center align-middle ",
                        "orderable": false,
                        width: "20",
                        // render: function(data, type, row) {
                        //     var html = "";
                        //     html +=
                        //         '<div class="form-check form-check-st-1"><input class="form-check-input" name="check-input" type="checkbox" value="' +
                        //         data + '" ></div>';
                        //     return html;
                        // }
                    },
                    {
                        targets: [1],
                        className: "align-middle text-left",
                        "orderable": false,
                        width: "100",
                        // render: function(data, type, row) {

                        //     var html = "";
                        //     html +=
                        //         '<a href="#editModal"  class="alink-st-1 tc-4"  data-bs-toggle="modal" data-bs-nameTh="' +
                        //         row.name.th + '" data-bs-nameEn="' + row.name.en + '" data-bs-id="' + row.id +
                        //         '" data-bs-creator="' + row.creator + '" data-bs-createDate="' + row
                        //         .create_date + '" data-bs-editor="' + row.editor + '" data-bs-editDate="' + row
                        //         .edit_date + '" data-bs-bgImage="' + row.bg_image + '" data-bs-status="' + row
                        //         .status + '" >' + data + '</a>';
                        //     return html;
                        // }
                    },
                    {
                        targets: [2],
                        className: "align-middle text-left",
                        "orderable": false,
                        width: "220",
                        // render: function(data, type, row) {
                        //     var html = "";
                        //     html += '<div class="fs-16">' + data.th + '</div>'
                        //     html += '<div class="tc-3 fs-14">' + data.en + '</div>'
                        //     return html;
                        // }
                    },
                    {
                        targets: [3],
                        className: "align-middle text-left",
                        width: "150",
                        "orderable": false,
                        width: "160",
                    },
                    {
                        targets: [4],
                        className: "align-middle text-left",
                        width: "150",
                        "orderable": false,
                        width: "160",
                    },
                    {
                        targets: [5],
                        className: "align-middle text-left",
                        "orderable": false,
                        width: "160",
                        // render: function(data, type, row) {
                        //     html = ''
                        //     html += '<div>' + data + '</div>'
                        //     html += '<div class="tc-3 fs-14 mt-1">' + row.edit_date + '</div'
                        //     return html;
                        // }
                    },
                    {
                        targets: [6],
                        className: "align-middle text-left",
                        "orderable": false,
                        width: "160",
                        // render: function(data, type, row) {
                        //     html = ''
                        //     html += '<div>' + data + '</div>'
                        //     html += '<div class="tc-3 fs-14 mt-1">' + row.edit_date + '</div'
                        //     return html;
                        // }
                    },
                    {
                        targets: [7],
                        className: "align-middle text-center",
                        "orderable": false,
                        width: "120",
                        // render: function(data, type, row) {
                        //     html = ''

                        //     if (data == 0) {
                        //         html +=
                        //             '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="check' +
                        //             row.id + '" value="' + row.id + '"><label for="check' + row.id +
                        //             '"><div class=""> ปิดใช้งาน</div></label></div>'
                        //     } else if (data == 1) {
                        //         html +=
                        //             '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="check' +
                        //             row.id + '" value="' + row.id + '" checked><label for="check' + row.id +
                        //             '"><div class="">เปิดใช้งาน</div></label></div>'
                        //     }

                        //     return html;
                        // }
                    },
                    {
                        targets: [8],
                        className: "align-middle text-center   ",
                        "orderable": false,
                        width: "100",
                        // render: function(data, type, row) {
                        //     var html = "";
                        //     html +=
                        //         '<button class="btn btn-table-edit-st-1  btn-delete"  data-bs-target="#editModal" data-bs-toggle="modal" data-bs-nameTh="' +
                        //         row.name.th + '" data-bs-nameEn="' + row.name.en + '" data-bs-id="' + row.id +
                        //         '" data-bs-creator="' + row.creator + '" data-bs-createDate="' + row
                        //         .create_date + '" data-bs-editor="' + row.editor + '" data-bs-editDate="' + row
                        //         .edit_date + '" data-bs-bgImage="' + row.bg_image + '"  data-bs-status="' + row
                        //         .status + '"></button>'
                        //     html += '<button class="btn btn-table-delete-st-1 ms-0 btn-delete" data-id="' +
                        //         data + '"></a>'
                        //     return html;
                        // }
                    }



                ],
                language: {
                    searchPlaceholder: 'ค้นหา เลขที่, ชื่อผู้จำหน่าย',
                    sSearch: '',
                    lengthMenu: 'แสดง _MENU_ ต่อหน้า',
                    infoEmpty: 'จาก 1 หน้า ( ทั้งหมด _TOTAL_ รายการ )',
                    info: "จาก _PAGES_ หน้า ( ทั้งหมด _MAX_ รายการ )",
                    oPaginate: {
                        sNext: '<i class="fa fa-chevron-right"></i>',
                        sPrevious: '<i class="fa fa-chevron-left"></i>',
                        sFirst: '<i class="fa fa-chevron-left"></i>',
                        sLast: '<i class="fa fa-chevron-right"></i>'
                    }
                },
                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "All"]
                ],

                "ordering": true,
                "dom": '<<t>pil>',
                buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        stripHtml: true,
                        columns: [1, 2, 3, 4, 5, 6, 7],
                        format: {
                            header: function(data, column) {
                                var header = ['', 'รหัส', 'ชื่อจังหวัด', 'จำนวนหมวดหมู่เล่ม', 'ยอดเข้าชม',
                                    'ผู้สร้าง', 'ผู้แก้ไขล่าสุด', 'สถานะ', 'จัดการข้อมูล'
                                ]
                                return header[column];
                            }
                        }
                    },
                    title: function() {
                        return "จัดการจังหวัด";
                    }

                }, ],
                select: {
                    style: 'multi',
                    selector: '.form-check-input'
                },

            });

            // var countStatus0 = table.column(7).data().filter(function(value, index) {
            //     return value === 0 ? true : false;
            // }).count();
            // var countStatus1 = table.column(7).data().filter(function(value, index) {
            //     return value === 1 ? true : false;
            // }).count();


            // $('.countStatus0').text(countStatus0)
            // $('.countStatus1').text(countStatus1)
            // $('.countStatus').text(countStatus0 + countStatus1);


            $('#search').keyup(function() {
                table.search($(this).val()).draw();
            })

            $('.select2-c2').on('select2:select', function(e) {
                var data = e.params.data;
                var text = data.text;
                if (data.text == 'ทั้งหมด') {
                    text = '';
                }
                table.column(2).search(text, true, false, true).draw();
            });
            $('.select2-c5').on('select2:select', function(e) {
                var data = e.params.data;
                var text = data.text;
                if (data.text == 'ทั้งหมด') {
                    text = '';
                }
                table.column(5).search(text, true, false, true).draw();
            });
            $('.select2-c6').on('select2:select', function(e) {
                var data = e.params.data;
                var text = data.text;
                if (data.text == 'ทั้งหมด') {
                    text = '';
                }
                table.column(6).search(text, true, false, true).draw();
            });


            $('.select2-c7').on('select2:select', function(e) {
                var data = e.params.data;
                var text = data.text;
                if (data.text == 'ทั้งหมด') {
                    text = '';
                }
                table.column(7).search(text, true, false, true).draw();
            });




            $('.input-status').on('change', function() {
                var status = $('.input-status:checked').val();
                table.column(7).search(status, true, false, true).draw();


            })


            $('.btn-sort').on('click', function() {

                var table = new $.fn.dataTable.Api('#list-table');
                var index = $(this).closest('th').index();

                if ($(this).hasClass('asc')) {
                    var sort = "desc"
                    $(this).removeClass('asc').addClass('desc')
                } else {
                    var sort = "asc"
                    $(this).removeClass('desc').addClass('asc')
                }

                table.order([
                    [index, sort]
                ]).draw();



            })
        </script>
        <script type="text/javascript">
            $('.switch-usage-status input').on('change', function() {

                if ($(this).is(':checked')) {
                    $(this).next('label').html('<div>เปิดใช้งาน</div>')
                } else {
                    $(this).next('label').html('<div>ปิดใช้งาน</div>')
                }

            })
        </script>
        <script type="text/javascript">
            $("#ExportReporttoExcel").on("click", function() {
                table.button('.buttons-excel').trigger();
            });
            $("#ExportReporttoPrint").on("click", function() {
                table.button('.buttons-print').trigger();
            });


            $('input[name=checkall]').on('click', function() {
                if ($(this).is(':checked')) {
                    $('input[name=check-input]').prop('checked', true);
                    table.rows().select();
                } else {
                    $('input[name=check-input]').prop('checked', false);
                    table.rows().deselect();
                }
            });
        </script>



        <script type="text/javascript">
            const successModal = new bootstrap.Modal('#successModal');

            const createModal = new bootstrap.Modal('#createModal');
            $("#createForm").submit(function(event) {
                event.preventDefault();
                event.stopPropagation();
                var form = $(this).get(0)
                if (form.checkValidity() === false) {
                    form.classList.add('was-validated');
                } else {
                    // console.log($(this).serialize()) //form data

                    var myData = [{
                        "id": 10,
                        "code": "CATM005",
                        "name": {
                            "th": "กาญจนบุรี",
                            "en": "Kanchanaburi"
                        },
                        "catalog_qty": "4",
                        "views": "5,146",
                        "creator": "นาย อัมฤทธิ์ จานุวี",
                        "create_date": "01/01/2565 12:12",
                        "editor": "นาย อัมฤทธิ์ จานุวี",
                        "edit_date": "01/01/2566 12:12",
                        "status": 1,

                    }]
                    table.rows.add(myData).draw();
                    createModal.hide();
                    successModal.show();
                }
            });
        </script>
        <script type="text/javascript">
            const editModal = document.getElementById('editModal')
            const neditModal = new bootstrap.Modal(editModal);
            editModal.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget
                const nameTh = button.getAttribute('data-bs-nameTh')
                const nameEn = button.getAttribute('data-bs-nameEn')
                const creatorDummy = button.getAttribute('data-bs-creatorDummy')
                const creator = button.getAttribute('data-bs-creator')
                const createDateDummy = button.getAttribute('data-bs-createDateDummy')
                const createDate = button.getAttribute('data-bs-createDate')
                const editorDummy = button.getAttribute('data-bs-editorDummy')
                const editor = button.getAttribute('data-bs-editor')
                const editDateDummy = button.getAttribute('data-bs-editDateDummy')
                const editDate = button.getAttribute('data-bs-editDate')
                const bgImage = button.getAttribute('data-bs-bgImage')
                const status = button.getAttribute('data-bs-status')
                const id = button.getAttribute('data-bs-id')



                $('#editModal input[name="nameTh"]').val(nameTh)
                $('#editModal input[name="nameEn"]').val(nameEn)
                $('#editModal input[name="creatorDummy"]').val(creatorDummy)
                $('#editModal input[name="creator"]').val(creator)
                $('#editModal input[name="createDateDummy"]').val(createDateDummy)
                $('#editModal input[name="createDate"]').val(createDate)
                $('#editModal input[name="editorDummy"]').val(editorDummy)
                $('#editModal input[name="editor"]').val(editor)
                $('#editModal input[name="editDateDummy"]').val(editDateDummy)
                $('#editModal input[name="editDate"]').val(editDate)

                if (bgImage != "") {
                    $('#editModal').find('.bx-fileupload').addClass('has-preview').find('img').attr('src', bgImage)
                } else {
                    $('#editModal').find('.bx-fileupload').removeClass('has-preview').find('img').attr('src', '')
                }
                if (status == 1) {
                    $('#editModal input[name="status"]').attr('checked', true)
                } else {
                    $('#editModal input[name="status"]').attr('checked', false)
                }



                $('#editModal input[name="id"]').val(id)
                $('#btnModal-delete').attr('data-id', id)

            })

            $("#editForm").submit(function(event) {
                event.preventDefault();
                event.stopPropagation();
                var form = $(this).get(0)
                if (form.checkValidity() === false) {
                    form.classList.add('was-validated');
                } else {

                    neditModal.hide();
                    successModal.show();
                }
            });

            $('#btnModal-delete').on('click', function() {
                var id = $(this).attr('data-id')
                neditModal.hide();
                successModal.show();
            })
        </script>


        <script type="text/javascript">
            $('.bx-fileupload-wrapper').on('click', function() {
                $(this).closest('.bx-fileupload').find('.input-fileupload').click();
            })
            $('.bx-fileupload-preview').on('click', function() {
                $(this).closest('.bx-fileupload').find('.input-fileupload').click();
            })
            $(document).on('change', '.input-fileupload', function() {
                var $this = $(this);
                var file = $this.get(0).files[0];

                var filesize = $this.get(0).files[0].size;

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.addEventListener("load", function(e) {

                    $this.closest('.bx-fileupload').addClass('has-preview').find('img').attr('src', e.target
                        .result)
                });


            })
            $(document).on('click', '.btn-delete-file', function() {
                $(this).closest('.bx-fileupload').removeClass('has-preview').find('input').val('');
            })
        </script>
    @endpush
@endonce
