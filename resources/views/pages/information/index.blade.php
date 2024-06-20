@extends('layouts.app')

@section('title')
    Informasi
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <div>Informasi Pendaftaran</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Informasi Pendaftaran</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="pt-4">
            <table id="informationTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-10/12">
                            Informasi</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#informationTable').DataTable({
                processing: true,
                ajax: "{{ route('informationData') }}",
                columns: [{
                        data: 'information',
                        name: 'information',
                        render: function(data) {
                            var parser = new DOMParser();
                            var doc = parser.parseFromString(data, 'text/html');
                            return doc.body.textContent || "";
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let editUrl = '{{ route('information.edit', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            return '<div class="flex">' +
                                '<a href="' + editUrl +
                                '" class="bg-yellow-500 px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Edit</a>'
                            '</div>';
                        }
                    },
                ]
            })
        })
    </script>
@endpush
