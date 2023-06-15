@extends('layouts.back')
@section('content')


    <div class="container-fluid">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb fs-16">
            <li class="breadcrumb-item "><a href="#" class="tc-2 fw-500 text-decoration-none">จัดการสินค้า</a></li>
            <li class="breadcrumb-item active tc-22 fw-500" aria-current="page">สินค้าแนะนำ</li>
          </ol>
        </nav>


        <div class="row">
            <div class="col">


                <div class="card card-st-3 border-0  mb-4 " style="">
                    <div class="card-body p-lg-4">
                        <div class="d-flex align-items-center">
                            <div class="fs-22 fw-bold mb-1 me-auto">รายการสินค้าแนะนำ</div>
                            <button type="button" class="btn btn-st-6 mb-1" data-bs-toggle="modal" data-bs-target="#addProductModal">เพิ่มสินค้า</button>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <span>คลิกที่สัญลักษณ์</span>
                            <button class="btn btn-table-rec-st-1 mx-2"></button>
                            <span>เพื่อลบออกจากแคตตาล็อกแนะนำ</span>

                        </div>
                        <table class="table" id="list-table">
                            <thead >
                                <tr>
                                    <th class="py-1 fw-500 ">
                                        <div class="form-check form-check-st-1" style="padding-left: 25px;padding-top: 7px;">
                                              <input class="form-check-input" name="checkall" type="checkbox" >
                                        </div>
                                    </th>
                                    <th class="py-1 fw-500">
                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">รหัสสินค้า</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                        
                                    </th>
                                    <th class="py-1 fw-500">
                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">ชื่อสินค้า</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                    </th>
                                    <th class="select2-filter py-1 fw-500">
                                        <div class="d-flex align-items-center ">
                                            <div class="me-2 fw-500">ชื่อบริษัท</div>
                                            <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                                        </div>
                                        <select class="form-control select2 select2-c3" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="select2-filter py-1 fw-500">
                                        <div class="d-flex align-items-center justify-content-center ">
                                            <div class="me-2 fw-500">จังหวัด</div>
                                            <button class="btn btn-sort p-0 align-self-center asc "></button>
                                        </div>
                                        <select class="form-control select2 select2-c4" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="select2-filter py-1 fw-500">
                                        <div class="d-flex align-items-center justify-content-center ">
                                            <div class="me-2 fw-500">หมวดสินค้า</div>
                                            <button class="btn btn-sort p-0 align-self-center asc "></button>
                                        </div>
                                        <select class="form-control select2 select2-c5" name="">
                                            <option value="">ทั้งหมด</option>
                                        </select>
                                    </th>
                                    <th class="select2-filter py-1 fw-500">
                                        <div>สถานะ</div>
                                        <select class="form-control select2 select2-status" name="">
                                            <option value="">ทั้งหมด</option>
                                            <option value="0"> ปิดใช้งาน</option>
                                            <option value="1">เปิดใช้งาน</option>
                                        </select>
                                    </th>
                                    <th class="py-1 fw-500">จัดอันดับ</th>
                                    <th class="py-1 fw-500"></th>
                                    <th class="py-1 fw-500"></th>

                                </tr>
                            </thead>
                        </table>


                    </div>

                </div>



            </div>

        </div>
    </div>


<div class="modal fade modal-st-1" id="addProductModal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered modal-xl">
<div class="modal-content p-4">
    <div class="d-flex align-items-center">
        <div class="me-auto mb-3 fs-22 fw-bolder">เลือกสินค้า</div>
        <div class="mb-5 d-flex align-items-center">
            <div class="fs-18 tc-2 me-3">คุณเลือก  <span class="productSelected tc-6">0</span> รายการ</div>
            <button class="btn btn-st-7 btn-add-product" disabled="">ตกลง</button>
        </div>
    </div>

    <form id="searchForm">
        <div class="">
            <div class="mb-4 row align-items-center pe-lg-5 ">
                <label class="col-lg-auto fs-16 tc-5" style="width: 180px;">ชื่อบริษัท / ชื่อกิจการ </label>
                <div class="col">
                    <select class="form-control select2Tag " name="companyName" data-placeholder="เลือก ชื่อบริษัท / ชื่อกิจการ" multiple="">
                        <option value="1">ร้านค้านงนุชพาณิชย์</option>
                        <option value="2">ร้านค้าเอกพาณิชย์</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="">
            <div class="mb-4 row align-items-center pe-lg-5 ">
                <label class="col-lg-auto fs-16 tc-5" style="width: 180px;">ชื่อสินค้า</label>
                <div class="col">
                    <input type="text" name="productName" class="form-control" placeholder="พิมพ์คำค้นหา">
                </div>
            </div>
        </div>

        <div class="mb-4 row align-items-center  ">
            <div class="col-lg-3">
                <label class=" fs-16 tc-2 fw-bolder mb-2" >หมวดสินค้า </label>
                <div class="">
                    <select class="form-control select2  form-select" name="productCategory" data-placeholder="เลือกประเภทสินค้า" >
                        <option value=""></option>
                        <option value="1">ของใช้และเครื่องแต่งกาย</option>
                        <option value="2">ของใช้และเครื่องแต่งกาย</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <label class=" fs-16 tc-2 fw-bolder mb-2" >หมวดย่อยสินค้า </label>
                <div class="">
                    <select class="form-control select2  form-select" name="productCategory" data-placeholder="เลือกหมวดย่อยสินค้าสินค้า" >
                        <option value=""></option>
                        <option value="1">ของใช้และเครื่องแต่งกาย</option>
                        <option value="2">ของใช้และเครื่องแต่งกาย</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <label class=" fs-16 tc-2 fw-bolder mb-2" >จังหวัด </label>
                <div class="">
                    <select class="form-control select2   form-select" name="province" data-placeholder="เลือกจังหวัด" >
                        <option value=""></option>
                        <option value="1">กาญจนบุรี </option>
                        <option value="2">กาญจนบุรี </option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 pt-1">
                <div class="pt-4">
                    <button type="button" id="btn-search-reset" class="btn btn-link ms-2 p-1 lh-lg fw-500 fs-16 text-decoration-none tc-2  mx-2" style="width: auto;min-width: auto;">ล้างค่า</button>
                    <button type="submit" class="btn btn-st-2 ms-2 p-1 lh-lg fw-500 fs-16 py-0  mx-2" style="width: 104px;min-width: 104px;height: 38px;">ค้นหา</button>
                </div>
            </div>
            
        </div>
    </form>



    <hr>

    <div class="mb-3 fs-22 fw-bolder pt-2">รายการสินค้า</div>
    <table class="table" id="list-table-2">
        <thead >
            <tr>
                <th class="py-1 fw-500 ">
                    <div class="form-check form-check-st-1" style="padding-left: 25px;padding-top: 7px;">
                          <input class="form-check-input" name="checkallModal" type="checkbox" >
                    </div>
                </th>
                <th class="py-1 fw-500">
                    <div class="d-flex align-items-center ">
                        <div class="me-2 fw-500">รหัสสินค้า</div>
                        <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                    </div>
                    
                </th>
                <th class="py-1 fw-500">
                    <div class="d-flex align-items-center ">
                        <div class="me-2 fw-500">ชื่อสินค้า</div>
                        <button class="btn btn-sort p-0 align-self-center asc me-auto"></button>
                    </div>
                </th>

                <th class="select2-filter py-1 fw-500">
                    <div class="d-flex align-items-center justify-content-center ">
                        <div class="me-2 fw-500">จังหวัด</div>
                        <button class="btn btn-sort p-0 align-self-center asc "></button>
                    </div>
                    <select class="form-control select2 select2-a3" name="">
                        <option value="">ทั้งหมด</option>
                    </select>
                </th>
                <th class="select2-filter py-1 fw-500">
                    <div class="d-flex align-items-center justify-content-center ">
                        <div class="me-2 fw-500">หมวดสินค้า</div>
                        <button class="btn btn-sort p-0 align-self-center asc "></button>
                    </div>
                    <select class="form-control select2 select2-a4" name="">
                        <option value="">ทั้งหมด</option>
                    </select>
                </th>
                <th class="select2-filter py-1 fw-500">
                    <div>สถานะ</div>
                    <select class="form-control select2 select2-a5" name="">
                        <option value="">ทั้งหมด</option>
                        <option value="0"> ปิดใช้งาน</option>
                        <option value="1">เปิดใช้งาน</option>
                    </select>
                </th>


            </tr>
        </thead>
    </table>

</div>
</div>
</div>


<div class="modal fade modal-st-1" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog  modal-dialog-centered modal-md" style="max-width: 450px;">
<div class="modal-content px-4 py-4">
    <form>
        <div class="text-center mb-4">
            
            <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.5 61C47.3447 61 61 47.3447 61 30.5C61 13.6553 47.3447 0 30.5 0C13.6553 0 0 13.6553 0 30.5C0 47.3447 13.6553 61 30.5 61Z" fill="#FFAD72"/>
            <path d="M25.6864 19.2366C27.8688 15.3232 28.9591 13.3665 30.5903 13.3665C32.2214 13.3665 33.3118 15.3232 35.4941 19.2366L36.0591 20.2494C36.6792 21.3621 36.9892 21.9185 37.4715 22.2854C37.9538 22.6523 38.5567 22.7883 39.7624 23.0605L40.8579 23.3085C45.0951 24.2679 47.212 24.7468 47.7167 26.3676C48.2197 27.9867 46.7763 29.6765 43.8877 33.0542L43.1401 33.9275C42.3202 34.8869 41.9086 35.3675 41.7243 35.96C41.54 36.5543 41.602 37.195 41.726 38.4748L41.8397 39.6409C42.2755 44.1486 42.4942 46.4016 41.1748 47.4023C39.8554 48.4048 37.8711 47.4902 33.906 45.6644L32.8777 45.1924C31.7512 44.6722 31.188 44.4139 30.5903 44.4139C29.9926 44.4139 29.4293 44.6722 28.3011 45.1924L27.2763 45.6644C23.3094 47.4902 21.3251 48.4031 20.0075 47.404C18.6863 46.4016 18.9051 44.1486 19.3409 39.6409L19.4545 38.4765C19.5786 37.195 19.6406 36.5543 19.4545 35.9617C19.272 35.3675 18.8603 34.8869 18.0404 33.9292L17.2929 33.0542C14.4043 29.6782 12.9609 27.9884 13.4638 26.3676C13.9685 24.7468 16.0871 24.2662 20.3244 23.3085L21.4199 23.0605C22.6239 22.7883 23.225 22.6523 23.709 22.2854C24.1913 21.9185 24.5014 21.3621 25.1215 20.2494L25.6864 19.2366Z" fill="white"/>
            </svg>

        </div>
        <div class="text-center fs-18 mb-4 fw-500">
            ลบออกจากรายการแนะนำ ? <br/>คุณต้องการลบออกจากรายการแนะนำหรือไม่ ?
        </div>
        <input type="hidden" name="productID" class="productID" value="">
        <div class="text-center pb-2 pt-2">
            <button class="btn btn-st-2 ms-2 p-1 lh-lg fw-500 fs-18  mx-2" style="width: 134px;min-width: 134px;background: #DE1414;border-radius: 3px;">ยืนยัน</button>
            <button type="button" class="btn btn-st-3 ms-2 p-1 lh-lg fw-500 fs-18 mx-2 text-white" style="width: 134px;min-width: 134px;background: #454545;border-radius: 3px;" data-bs-dismiss="modal">ยกเลิก</button>
            
        </div>

    </form>

</div>
</div>
</div>

@endsection

@once
    @push('script')
    <script type="text/javascript">
		const addProductModalEl = document.getElementById('addProductModal')
		const addProductModal = new bootstrap.Modal(addProductModalEl);

		const confirmModalEl = document.getElementById('confirmModal')
		const confirmModal = new bootstrap.Modal(confirmModalEl);
	</script> 

	<script type="text/javascript">
		$(function() {
          	var start = moment().subtract(0, 'days');
          	var end = moment();
          	function cb(start, end) {

          		console.log( start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY') )
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
	               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	            }
	        }, cb);
          	cb(start, end);


          	$('.daterange').on('apply.daterangepicker', function(ev, picker) {
			      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
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
				    "noResults": function(){
				        return '<div class="fs-12 py-2">ไม่พบข้อมูล</div>';
				    }
				},
			    escapeMarkup: function (markup) {
			        return markup;
			    }
		    });

		    $('.select2Search').select2({
		    	minimumResultsForSearch: 2,
		    	"language": {
				    "noResults": function(){
				        return '<div class="fs-12 py-2">ไม่พบข้อมูล</div>';
				    }
				},
			    escapeMarkup: function (markup) {
			        return markup;
			    }
		    });
		    $('.select2Tag').select2({
		    	minimumResultsForSearch: 2,
		    	"language": {
				    "noResults": function(){
				        return '<div class="fs-12 py-2">ไม่พบข้อมูล</div>';
				    }
				},
			    escapeMarkup: function (markup) {
			        return markup;
			    }
		    });


		    $('.provinceselect').SumoSelect({placeholder: 'เลือกจังหวัด'});
		});
	</script>

	<script type="text/javascript">
		$('.switch-usage-status input').on('change',function(){

			if($(this).is(':checked')){
				$(this).next('label').html('<div>เปิดใช้งาน</div>')
			}else{
				$(this).next('label').html('<div>ปิดใช้งาน</div>')
			}

		})
	</script>
	<script type="text/javascript">

		var myData4 = [
		    {
		    	"no":1,
		        "id": 1,
		        "code":"PRO001",
		        "image": "/backend/assets/images/product.png",
		        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
		        "company": "นงนุชพาณิชย์",
		        "province": "กาญจนบุรี ",
		        "productCategory": "ของใช้และเครื่องแต่งกาย",
		        "status": 1,
		        "link":"https://t"
		        
		    },
		    {
		    	"no":2,
		        "id": 2,
		        "code":"PRO002",
		        "image": "/backend/assets/images/product.png",
		        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
		        "company": "นงนุชพาณิชย์",
		        "province": "กาญจนบุรี ",
		        "productCategory": "ของใช้และเครื่องแต่งกาย",
		        "status": 1,
		        "link":"https://t"
		        
		    },
		    {
		    	"no":3,
		        "id": 2,
		        "code":"PRO003",
		        "image": "/backend/assets/images/product.png",
		        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
		        "company": "นงนุชพาณิชย์",
		        "province": "กาญจนบุรี ",
		        "productCategory": "ของใช้และเครื่องแต่งกาย",
		        "status": 1,
		        "link":"https://t"
		        
		    },
		    {
		    	"no":4,
		        "id": 2,
		        "code":"PRO004",
		        "image": "/backend/assets/images/product.png",
		        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
		        "company": "นงนุชพาณิชย์",
		        "province": "กาญจนบุรี ",
		        "productCategory": "ของใช้และเครื่องแต่งกาย",
		        "status": 1,
		        "link":"https://t"
		        
		    },

		];


		var table =	$('#list-table').DataTable({
	        scrollX:        true,
	        scrollCollapse: true,
	        sPaginationType: "listbox",
			data: myData4,
		    columns: [
		        { data: 'id' },
		        { data: 'code' },
		        { data: 'name' },
		        { data: 'company' },
		        { data: 'province' },
		        { data: 'productCategory' },
		        { data: 'status'},
		        { data: 'id'},
		        { data: 'id'},	
		        { data: 'no'},

		    ],
		    columnDefs : [

		    	{ targets : [0],className:"text-start align-middle ","orderable": false,"width":"50",
		    		render : function (data, type, row) {
			          	var html = "";
			          	html += '<div class="form-check form-check-st-1"><input class="form-check-input" name="check-input" type="checkbox" value="'+data+'" ></div>';
			            return html;
			        }
		    	},
		        { targets : [1],className:"align-middle text-start","orderable": false,
		        	render : function (data, type, row) {
			          	var html = "";
			          	html += '<a href="/'+row.id+'" class="btn btn-link p-0" >'+data+'</a> ';
			            return html;
			        }
		    	}
		    	,
		        { targets : [2],className:"align-middle text-left","orderable": false,
		        	render : function (data, type, row) {
			          	var html = "";
			          	html += '<div class="d-flex align-items-center">'
			          	html += '<img src="'+row.image+'" style="width:60px;" class="">'
			          	html += '<div class="ps-2">'+data+'</div>'
			          	html += '</div>'
			            return html;
			        }
		    	},
		    	{ targets : [3],className:"align-middle text-left","orderable": false,"width":"180",

		    	},
		    	{ targets : [4],className:"align-middle text-center","orderable": false,

		    	},
		    	
		    	{ targets : [5],className:"align-middle text-center","orderable": false,

		    	},
		    	{ targets : [6],className:"align-middle text-center",orderable: false,
		    		render : function (data, type, row) {
		        		html = ''

		        		if(data == 0){
		        			html += '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="check'+row.id+'" value="'+row.id+'"><label for="check'+row.id+'"><div class=""> ปิดใช้งาน</div></label></div>'
		        		}else if(data == 1){
		        			html += '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="check'+row.id+'" value="'+row.id+'" checked><label for="check'+row.id+'"><div class="">เปิดใช้งาน</div></label></div>'
		        		}
			          	
			            return html;
			        }
		    	},
		    	{ targets : [7],className:"align-middle text-center ",width:"120","orderable": false,
		        	render : function (data, type, row) {
			          	var html = "";
			          	html += '<button type="button" class="btn btn-sort-c btn-up"><img src="/backend/assets/images/icon/arrow-up.png" width="9" height="15"></button>'
			          	html += '<button type="button" class="btn btn-sort-c mx-2 btn-down"><img src="/backend/assets/images/icon/arrow-down.png" width="9" height="15"></button>'
			          	html += '<button type="button" class="btn btn-sort-c move-selector"><img src="/backend/assets/images/icon/move-selector.png" width="14" height="14"></button>'
			            return html;
			        }		
		    	},
		    	{ targets : [8],className:"align-middle text-center   ","orderable": false,width:"120",
		        	render : function (data, type, row) {
		        		var html = "";
		        		html += '<button class="btn btn-table-link-st-1 ms-0 btn-copy-link" data-id="'+data+'" data-link="'+row.link+'"></button>'
		        		html += '<a href="" class="btn btn-table-edit-st-1 ms-0 " data-id="'+data+'"></a>'
		        		html += '<button class="btn btn-table-rec-st-1 ms-0  btn-delete-rec" data-id="'+data+'"> </button>'
			          	
			            return html;
			        }
		    	},
		    	{ targets : [9],className:"text-center align-middle ",visible:false,"orderable": false,"width":"50",

		    	},


				  				
							  			
		    ],
			language: {
				searchPlaceholder: 'ค้นหา เลขที่, ชื่อผู้จำหน่าย',
				sSearch: '',
				lengthMenu: 'แสดง _MENU_ ต่อหน้า',
				infoEmpty:'จาก 1 หน้า ( ทั้งหมด _TOTAL_ รายการ )',
				info: "จาก _PAGES_ หน้า ( ทั้งหมด _MAX_ รายการ )",
				oPaginate: {
			   		sNext: '<i class="fa fa-chevron-right"></i>',
			   		sPrevious: '<i class="fa fa-chevron-left"></i>',
			   		sFirst: '<i class="fa fa-chevron-left"></i>',
			   		sLast: '<i class="fa fa-chevron-right"></i>'
			    }
			},
			aLengthMenu: [
		        [10,25, 50, 100, 200, -1],
		        [10,25, 50, 100, 200, "All"]
		    ],
	
			"ordering": true,
			"order":[9,'asc'],
			"dom": '<<t>pil>',
			buttons: [
				{
		            extend: 'excel',
		            exportOptions: {
		               stripHtml: true,
		               columns: [ 1, 2, 3, 4,5,6,8],
		               format: {
					        header: function ( data, column ) {
					        	var header = ['','รหัส','','ชื่อแบนเนอร์','วันที่เผยเเพร่','ผู้สร้าง','ผู้แก้ไข','','สถานะ']
					            return header[column];
					        }
					    }
		            },               
		            title: function() {
					    return "Banner";
					}
	   
		        },    
		    ],
		    select: {
	        	style: 'multi',
	            selector: '.form-check-input'
	        },
        	rowReorder: {
	            selector: '.move-selector',
	            dataSrc:"no",

	        },
	        stateSave: false,
		    'drawCallback': function (settings) {
		        $('.btn-up').unbind('click');
		        $('.btn-down').unbind('click');
		        $('.btn-up').click(moveRowUp);
		        $('.btn-down').click(moveRowDown);
		    }


		});
	
		function moveRowUp() {
		    var row = $(this).parents('tr');

		    var index = table.row(row).index();
		    var data1 = table.row(index).data();


		    var index2 = table.row(row.prev('tr')).index();
		    var data2 = table.row(index2).data();

		    data1.no = data1.no - 1;
		    data2.no = data1.no + 1;


		    table.row(index).data(data2).draw();
		    table.row(index2).data(data1).draw();
		}

		function moveRowDown() {
		    var row = $(this).parents('tr');

		    var index = table.row(row).index();
		    var data1 = table.row(index).data();

		    var index2 = table.row(row.next('tr')).index();
		    var data2 = table.row(index2).data();

		    data1.no = data1.no + 1;
		    data2.no = data1.no - 1;


	
		    table.row(index2).data(data1).draw();
		    table.row(index).data(data2).draw();

		}





		$('.select2-status').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table.column(5).search( text,true, false, true  ).draw();
		});
		$('.select2-c3').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table.column(3).search( text,true, false, true  ).draw();
		});
		$('.select2-c4').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table.column(4).search( text,true, false, true  ).draw();
		});
		$('.select2-c5').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table.column(5).search( text,true, false, true  ).draw();
		});


		$('.btn-sort').on('click',function(){

			var table = new $.fn.dataTable.Api( '#list-table' );
			var index = $(this).closest('th').index();
			
			if($(this).hasClass('asc')){
				var sort = "desc"
				$(this).removeClass('asc').addClass('desc')
			}else{
				var sort = "asc"
				$(this).removeClass('desc').addClass('asc')
			}

			table.order([[index , sort]]).draw();
			

		})

		$('#list-table').on('click','.btn-delete-rec',function(){
			var productID = $(this).attr('data-id')
			$('#confirmModal').find('.productID').val(productID)
			confirmModal.show();
		})

		$('#list-table').on('click','.btn-copy-link',function(){
			var link = $(this).attr('data-link')
		    var $temp = $("<input>");
		    $("body").append($temp);
		    $temp.val(link).select();
		    document.execCommand("copy");
		    $temp.remove();


		})
	</script>
	<script type="text/javascript">

		$('input[name=checkall]').on('click',function() {
		    if($(this).is(':checked')){
		    	$('input[name=check-input]').prop('checked',true);
		    	table.rows().select();
		    }else{
		    	$('input[name=check-input]').prop('checked',false);
		    	table.rows().deselect();
		    }
		});

	</script>

	<script type="text/javascript">
		
		var myData2 = [];


		var table2 =	$('#list-table-2').DataTable({
	        scrollX:        true,
	        scrollCollapse: true,
	        sPaginationType: "listbox",
			data: myData2,
		    columns: [
		        { data: 'id' },
		        { data: 'code' },
		        { data: 'name' },
		        { data: 'province' },
		        { data: 'category' },
		        { data: 'status'}

		    ],
		    columnDefs : [

		    	{ targets : [0],className:"text-start align-middle ","orderable": false,"width":"20",
		    		render : function (data, type, row) {
			          	var html = "";
			          	html += '<div class="form-check form-check-st-1"><input class="form-check-input" name="check-input-m" type="checkbox" value="'+data+'" ></div>';
			            return html;
			        }
		    	},
		        { targets : [1],className:"align-middle text-start","orderable": false,"width":"100",
		        	render : function (data, type, row) {
			          	var html = "";
			          	html += '<a href="/'+row.id+'" class="btn btn-link p-0" >'+data+'</a> ';
			            return html;
			        }
		    	}
		    	,
		        { targets : [2],className:"align-middle text-left","orderable": false,
		        	render : function (data, type, row) {
			          	var html = "";
			          	html += '<div class="d-flex align-items-center">'
			          	html += '<img src="'+row.image+'" style="width:60px;" class="">'
			          	html += '<div class="ps-2">'+data+'</div>'
			          	html += '</div>'
			            return html;
			        }
		    	},
		    	{ targets : [3],className:"align-middle text-left","orderable": false,"width":"150",

		    	},
		    	
		    	{ targets : [4],className:"align-middle text-center","orderable": false,"width":"150",

		    	},
		    	{ targets : [5],className:"align-middle text-center",orderable: false,"width":"100",
		    		render : function (data, type, row) {
		        		html = ''

		        		if(data == 0){
		        			html += '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="mcheck'+row.id+'" value="'+row.id+'"><label for="mcheck'+row.id+'"><div class=""> ปิดใช้งาน</div></label></div>'
		        		}else if(data == 1){
		        			html += '<div class="switch-usage-status"><input type="checkbox" name="" class="hide-input" id="mcheck'+row.id+'" value="'+row.id+'" checked><label for="mcheck'+row.id+'"><div class="">เปิดใช้งาน</div></label></div>'
		        		}
			          	
			            return html;
			        }
		    	},
		    	

				  				
							  			
		    ],
			language: {
				searchPlaceholder: 'ค้นหา เลขที่, ชื่อผู้จำหน่าย',
				sSearch: '',
				lengthMenu: 'แสดง _MENU_ ต่อหน้า',
				infoEmpty:'จาก 1 หน้า ( ทั้งหมด _TOTAL_ รายการ )',
				info: "จาก _PAGES_ หน้า ( ทั้งหมด _MAX_ รายการ )",
				oPaginate: {
			   		sNext: '<i class="fa fa-chevron-right"></i>',
			   		sPrevious: '<i class="fa fa-chevron-left"></i>',
			   		sFirst: '<i class="fa fa-chevron-left"></i>',
			   		sLast: '<i class="fa fa-chevron-right"></i>'
			    }
			},
			aLengthMenu: [
		        [10,25, 50, 100, 200, -1],
		        [10,25, 50, 100, 200, "All"]
		    ],
	
			"ordering": true,
			"order":[0,'asc'],
			"dom": '<<t>pil>',
			buttons: [
				{
		            extend: 'excel',
		            exportOptions: {
		               stripHtml: true,
		               columns: [ 1, 2, 3, 4,5,6,8],
		               format: {
					        header: function ( data, column ) {
					        	var header = ['','รหัส','','ชื่อแบนเนอร์','วันที่เผยเเพร่','ผู้สร้าง','ผู้แก้ไข','','สถานะ']
					            return header[column];
					        }
					    }
		            },               
		            title: function() {
					    return "Banner";
					}
	   
		        },    
		    ],
		    select: {
	        	style: 'multi',
	            selector: '.form-check-input'
	        },

		});




		$('.select2-a3').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table2.column(3).search( text,true, false, true  ).draw();
		});
		$('.select2-a4').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table2.column(4).search( text,true, false, true  ).draw();
		});
		$('.select2-a5').on('select2:select', function (e) {
		    var data = e.params.data;
		    var text = data.text;
		    if(data.text == 'ทั้งหมด'){
		    	text = '';
		    }
		    table2.column(5).search( text,true, false, true  ).draw();
		});


		$('#list-table-2 .btn-sort').on('click',function(){

			var table2 = new $.fn.dataTable.Api( '#list-table-2' );
			var index = $(this).closest('th').index();
			
			if($(this).hasClass('asc')){
				var sort = "desc"
				$(this).removeClass('asc').addClass('desc')
			}else{
				var sort = "asc"
				$(this).removeClass('desc').addClass('asc')
			}

			table2.order([[index , sort]]).draw();
	
		})


		addProductModalEl.addEventListener('shown.bs.modal', event => {
			table2.columns.adjust().draw();

		})
		addProductModalEl.addEventListener('hide.bs.modal', event => {
			$( "#searchForm input" ).val('')
        	$( "#searchForm select" ).val('').trigger('change')

        	table2.clear().draw();

		})




		$('input[name=checkallModal]').on('click',function() {
		    if($(this).is(':checked')){
		    	$('input[name=check-input-m]').prop('checked',true);
		    	table2.rows().select();
		    }else{
		    	$('input[name=check-input-m]').prop('checked',false);
		    	table2.rows().deselect();
		    }
		    getProductSelected();
		});



		$( "#searchForm" ).submit(function( event ) {
           	event.preventDefault();
            event.stopPropagation();
            var form = $(this).get(0)
            if (form.checkValidity() === false) {
                form.classList.add('was-validated');
            }else{
              	console.log($( this ).serialize()) //form data


              	var myData2 = [
				    {
				        "id": 1,
				        "code":"PRO001",
				        "image": "/backend/assets/images/product.png",
				        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
				        "province": "กาญจนบุรี ",
				        "category": "ของใช้และเครื่องแต่งกาย",
				        
				        "status": 1,
				        
				    },
				    {
				        "id": 2,
				        "code":"PRO001",
				        "image": "/backend/assets/images/product.png",
				        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
				        "province": "กาญจนบุรี ",
				        "category": "ของใช้และเครื่องแต่งกาย",
				        
				        "status": 1,
				        
				    },
				    {
				        "id": 3,
				        "code":"PRO001",
				        "image": "/backend/assets/images/product.png",
				        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
				        "province": "กาญจนบุรี ",
				        "category": "ของใช้และเครื่องแต่งกาย",
				        
				        "status": 1,
				        
				    },
				    

				];

				table2.clear().draw();
				table2.rows.add(myData2);
				table2.columns.adjust().draw();
            }
        });

        $('#btn-search-reset').on('click',function(){
        	$( "#searchForm input" ).val('')
        	$( "#searchForm select" ).val('').trigger('change')

        	table2.clear().draw();
        })

        $(document).on('change','input[name=check-input-m]',function(){
        	getProductSelected();
        })

        function getProductSelected(){
        	var product = [];
        	$('#list-table-2 tbody tr').each(function(i, obj) {
			    var input = $(this).find('input[name="check-input-m"]');
			    if(input.is(':checked')){
			    	product.push(input.val())
			    }
			});

			if(product.length > 0 ){
				$('.btn-add-product').prop('disabled',false)
				$('.btn-add-product').attr('data-productID',product)
			}else{

				$('.btn-add-product').prop('disabled',true)
			}
			$('.productSelected').text(product.length)

        }

        $('.btn-add-product').on('click',function(){
        	var productID = $(this).attr('data-productID');
        	console.log(productID);

			var myDataf = [
		    {
		        "no":5,
		        "id": 10,
		        "code":"PRO004",
		        "image": "/backend/assets/images/product.png",
		        "name": "เสื้อไหมหม่อนผู้ชายแต่งแถบผ้าฝ้ายทอมืออัดผ้ากาวทั้งตัวงาน",
		        "company": "นงนุชพาณิชย์",
		        "province": "กาญจนบุรี ",
		        "productCategory": "ของใช้และเครื่องแต่งกาย",
		        "status": 1,
		        "link":"https://t"
		        
		    }];

		    table.rows.add(myDataf);
			table.columns.adjust().draw();

        	addProductModal.hide();
        })

	</script>
    @endpush
@endonce