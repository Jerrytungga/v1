<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Report</title>
  
    <style>
             /* Custom Styles */
             table {
    width: 100%;
    border-collapse: collapse; /* Ensures borders do not overlap */
    margin-top: 20px;
    border: 1px solid #ddd; /* Border for the whole table */
}

th, td {
    padding: 12px;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #ddd; /* Border for each table cell */
}

th {
    background-color: #495057;
    color: #fff;
}

        .achievement {
            color: red;
            font-weight: bold;
        }

        .target {
            color: blue;
            font-weight: bold;
        }

        /* Add hover effect to table rows */
        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .badge {
            font-size: 0.9rem;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        /* Custom notes for color key */
        .key-text {
            font-size: 14px;
            margin-top: 20px;
        }

        .key-text span {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .container {
            margin-top: 30px;
        }

        .namet {
            width: 25%;
            word-wrap: break-word;
        }

        .badge {
        font-size: 0.9rem;
        padding: 6px 12px;
        border-radius: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .bg-primary {
        background-color: #007bff;
        color: white;
        margin: 10px;
        border-radius: 10%;
    }

    .bg-danger {
        background-color: #dc3545;
        color: white;
        margin: 10px;
    }

    .bg-warning {
        background-color: #ffc107;
        color: white;
        margin-top: 10px;
        color: #495057;
    }

    /* Hover Effect for Badges */
    .badge:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    th.trainee-column {
    width: 30%; /* Set the width of the 'Trainee' column to 40% */
}
    th.no {
    width: 5%; /* Set the width of the 'Trainee' column to 40% */
}

    /* Custom Badge for small text sizes */
    .badge-sm {
        font-size: 0.8rem;
        padding: 4px 8px;
    }

        /* Make the table more responsive */
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th {
                text-align: left;
                background-color: #f8f9fa;
                padding: 8px;
            }

            td {
                text-align: left;
                padding: 8px;
            }

            tr {
                margin-bottom: 10px;
            }

            .namet {
                width: 100%;
            }
        }
    </style>
</head>
<body class="container">

    <h2 class="text-center my-4">WEEKLY JOURNAL REPORT</h2>
    <h4 class="text-center mb-4">Week: {{ $week }} || Batch: {{ $angkatan }}</h4>


    <table>
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="trainee-column">Trainee</th>
                <th>Bible Reading</th>
                <th>Memorizing Verses</th>
                <th>Hymns</th>
                <th>5 Times Prayer</th>
                <th>Personal Goals</th>
                <th>Good Land</th>
                <th>Prayer Book</th>
                <th>Summary Of Ministry</th>
                <th>Fellowship</th>
                <th>Script Ts & Exhibition</th>
                <th>Agenda</th>
                <th>Financial Statements</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($report as $index => $data)
            @php
                $standar = \App\Models\Poinjurnal::where('semester', $data->semester)->first();
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><br>
                    @php
                        $trainee = \App\Models\Trainee::where('nip', $data->nip)->first();
                    @endphp
                    {{ $trainee ? $trainee->name : '' }}
                    <br><br>
                    <span class="badge badge-sm bg-primary">Semester: {{ $data->semester }} || 
                        Asisten: 
                        @php
                            $assistant = \App\Models\Asisten::where('nip', $data->asisten_id)->first();
                        @endphp
                        {{ $assistant ? $assistant->name : 'No Assistant' }}
                    </span>
                    <br><br>
                    @php
                        if($data->status == 'C') {
                            echo '<span class="badge badge-sm bg-success">Status: Completed</span><br><br> ';
                        } else {
                            echo '<span class="badge badge-sm bg-danger">Status: Incomplete</span><br><br>';
                        }
                    @endphp
                    <span class="badge badge-sm bg-warning">Note: {{ $data->catatan }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->bible }}</span> 
                    <span class="target">{{ $standar ? $standar->bible : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->memorizing }}</span> 
                    <span class="target">{{ $standar ? $standar->memorizing_bible : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->hymns }}</span> 
                    <span class="target">{{ $standar ? $standar->hymns : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->prayer_5_time }}</span> 
                    <span class="target">{{ $standar ? $standar->five_times_prayer : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->p_goals }}</span> 
                    <span class="target">{{ $standar ? $standar->personal_goals : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->tp }}</span> 
                    <span class="target">{{ $standar ? $standar->good_land : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->doa }}</span> 
                    <span class="target">{{ $standar ? $standar->prayer_book : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->ministry }}</span> 
                    <span class="target">{{ $standar ? $standar->summary_of_ministry : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->fellowship }}</span> 
                    <span class="target">{{ $standar ? $standar->fellowship : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->ts }}</span> 
                    <span class="target">{{ $standar ? $standar->script_ts_exhibition : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->agenda }}</span> 
                    <span class="target">{{ $standar ? $standar->agenda : 0 }}</span>
                </td>
                <td class="text-center">
                    <span class="achievement">{{ $data->finance }}</span> 
                    <span class="target">{{ $standar ? $standar->finance : 0 }}</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="key-text"><span style="color: red;">.</span> The red color indicates the achievement points.</p>
    <p class="key-text"><span style="color: blue;">.</span> The blue color indicates the target points that must be achieved.</p>

</body>
</html>
