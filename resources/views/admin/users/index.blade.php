@extends('layouts.app')

@section('title', 'CREW MANIFEST')

@section('content')
    <div class="panel">
        <h1 class="panel-title">
            <i class="fas fa-users"></i>
            CREW MANIFEST
        </h1>

        @if (session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table class="imperial-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IMPERIAL DESIGNATION</th>
                        <th>HOLONET CONTACT</th>
                        <th>CLEARANCE LEVEL</th>
                        <th>COMMANDS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="id-cell">TK-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="clearance-badge clearance-{{ strtolower($user->role) }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="action-cells">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn-edit">
                                    <i class="fas fa-user-edit"></i> MODIFY
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="delete-user-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="fas fa-user-slash"></i> TERMINATE
                                    </button>
                                </form>
                                <a href="{{ route('admin.users.show', $user) }}" class="btn-view">
                                    <i class="fas fa-user-secret"></i> DOSSIER
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Panel styling */
        .panel {
            background: rgba(10, 20, 30, 0.8);
            border: 1px solid rgba(225, 11, 11, 0.3);
            border-radius: 6px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(225, 11, 11, 0.05) 0%, transparent 50%, rgba(225, 11, 11, 0.05) 100%);
            pointer-events: none;
        }

        .panel-title {
            color: #00c896;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid rgba(225, 11, 11, 0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Orbitron', sans-serif;
        }

        /* Alert styling */
        .alert-success {
            background: rgba(0, 200, 0, 0.2);
            border: 1px solid rgba(0, 200, 0, 0.5);
            border-radius: 4px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #00ff88;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-family: 'Electrolize', sans-serif;
        }

        /* Table container */
        .table-container {
            overflow-x: auto;
            border-radius: 6px;
            border: 1px solid rgba(225, 11, 11, 0.2);
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
        }

        /* Imperial table styling */
        .imperial-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Electrolize', sans-serif;
            position: relative;
        }

        .imperial-table th {
            background: rgba(225, 11, 11, 0.2);
            color: #00c896;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid rgba(225, 11, 11, 0.3);
            font-family: 'Orbitron', sans-serif;
        }

        .imperial-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(225, 11, 11, 0.1);
            color: #dee6ef;
        }

        .imperial-table tr:hover td {
            background: rgba(225, 11, 11, 0.1);
            color: #ffe81f;
        }

        /* Special cells */
        .id-cell {
            font-family: 'Orbitron', sans-serif;
            color: #00a2ff;
            font-weight: bold;
        }

        .action-cells {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        /* Clearance badges */
        .clearance-badge {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .clearance-admin {
            background: rgba(225, 11, 11, 0.3);
            color: #ffe81f;
            border: 1px solid rgba(225, 11, 11, 0.5);
        }

        .clearance-user {
            background: rgba(0, 162, 255, 0.2);
            color: #00a2ff;
            border: 1px solid rgba(0, 162, 255, 0.4);
        }

        .clearance-editor {
            background: rgba(0, 200, 150, 0.2);
            color: #00c896;
            border: 1px solid rgba(0, 200, 150, 0.4);
        }

        /* Button styles */
        .btn-edit, .btn-delete, .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-edit {
            background: rgba(0, 162, 255, 0.2);
            color: #00a2ff;
            border: 1px solid rgba(0, 162, 255, 0.4);
        }

        .btn-edit:hover {
            background: rgba(0, 162, 255, 0.4);
            color: white;
            box-shadow: 0 0 10px rgba(0, 162, 255, 0.5);
        }

        .btn-delete {
            background: rgba(225, 11, 11, 0.2);
            color: #e10b0b;
            border: 1px solid rgba(225, 11, 11, 0.4);
        }

        .btn-delete:hover {
            background: rgba(225, 11, 11, 0.4);
            color: white;
            box-shadow: 0 0 10px rgba(225, 11, 11, 0.5);
        }

        .btn-view {
            background: rgba(0, 200, 150, 0.2);
            color: #00c896;
            border: 1px solid rgba(0, 200, 150, 0.4);
        }

        .btn-view:hover {
            background: rgba(0, 200, 150, 0.4);
            color: white;
            box-shadow: 0 0 10px rgba(0, 200, 150, 0.5);
        }

        /* Form styling */
        .inline-form {
            display: inline;
            margin: 0;
            padding: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .action-cells {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .btn-edit, .btn-delete, .btn-view {
                width: 100%;
                justify-content: center;
            }
            
            .imperial-table th, 
            .imperial-table td {
                padding: 0.8rem 0.5rem;
                font-size: 0.9rem;
            }
        }

         .sw-toast {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
            border: 2px solid #00c896;
            box-shadow: 0 0 12px #00ff88;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // 🔊 Play sound and show toast (success)
        @if (session('success'))
            let successAudio = document.getElementById('lightsaber-sound');
            if (successAudio) successAudio.play();

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#1a1a1a',
                color: '#00ff88',
                customClass: {
                    popup: 'sw-toast'
                }
            });
        @endif

        // ❌ Toast for errors
        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#1a1a1a',
                color: '#ff4c4c',
                customClass: {
                    popup: 'sw-toast'
                }
            });
        @endif

        // ⚠️ SweetAlert for DELETE confirmation
        const deleteForms = document.querySelectorAll('.delete-user-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Terminate Crew Member?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, terminate!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // 🎯 Hover animation
        const buttons = document.querySelectorAll('.btn-edit, .btn-delete, .btn-view');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', () => button.style.transform = 'translateY(-2px)');
            button.addEventListener('mouseleave', () => button.style.transform = '');
        });
    });
</script>


@endsection