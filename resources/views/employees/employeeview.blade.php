<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>employee list</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 20px;
            font-family: 'Kanit', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .btn {
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-warning {
            background-color: #ff0000;
            /* Red background */
            color: #ffffff;
            /* White text */
        }

        .btn-warning:hover {
            background-color: #cc0000;
            /* Darker red on hover */
        }

        .btn-edit {
            background-color: #f0ad4e;
            /* Yellow button */
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #ec971f;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.admin')

    @section('content')
        <div class="p-6 bg-white border h-[100vh] flex justify-center w-full">
            <div class="container mx-auto">
                <div class="bg-white  p-4 px-4 md:p-8 mb-6 h-[80vh]">
                    <h1 class="text-center text-2xl font-bold mb-3">รายชื่อพนักงาน</h1>
                    @if ($employees->isEmpty())
                        <p class="text-center text-2xl font-bold mb-3">ไม่พบพนักงาน</p>
                    @else
                        <div class="relative overflow-x-auto  ">
                            <table class="text-sm text-center rtl:text-center text-black">
                                <thead class="text-sm text-black uppercase bg-white text-center">
                                    <tr>
                                        <th class="text-center p-2 px-2 gap-2 w-1/12">รหัสพนักงาน</th>
                                        <th class="text-center p-2 px-2 gap-2 w-1/12">ชื่อ</th>
                                        <th class="text-center p-2 px-2 gap-2 w-1/12">อีเมล</th>
                                        <th class="text-center p-2 px-2 gap-2 w-1/12">สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($employees as $employee)
                                        <tr class="even:bg-gray-50">
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td class="flex justify-center gap-3">
                                                <div>
                                                    <a href="{{ route('employee.edit', $employee->id) }}"
                                                        class="btn bg-yellow-500 py-2">แก้ไข</a>

                                                    <form id="del_form_{{ $employee->id }}"
                                                        action="{{ route('employee.delete', $employee->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="del_btn_{{ $employee->id }}" type="submit"
                                                            class="btn btn-warning">ลบ</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('button[id^="del_btn_"]').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    const employeeId = this.id.split('_')[2]; // Extract the employee ID from the button ID
                    const form = document.getElementById(`del_form_${employeeId}`);

                    Swal.fire({
                        title: "คุณแน่ใจว่าจะลบชื่อพนักงานคนนี้หรือไม่?",
                        text: "แน่ใจใช่ไหม?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "ใช่, ฉันแน่ใจ!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        </script>


    @endsection
</body>
