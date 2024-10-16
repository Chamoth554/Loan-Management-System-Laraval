<style>
    .table-container {
        max-width: 100%; /* Full width container */
        margin: 20px auto; /* Centering the table */
        overflow-x: auto; /* Allow horizontal scrolling on smaller screens */
    }

    table {
        width: 100%; /* Full width for the table */
        border-collapse: collapse; /* Merge border for cleaner look */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        border-radius: 8px; /* Rounded corners for the table */
        overflow: hidden; /* Prevents overflow on rounded corners */
    }

    th, td {
        padding: 12px; /* Space inside table cells */
        text-align: left; /* Align text to the left */
        border-bottom: 1px solid #e5e7eb; /* Light gray border for rows */
    }

    th {
        background-color: #3b82f6; /* Header background color */
        color: white; /* Header text color */
        font-weight: bold; /* Bold font for header */
    }

    tr:hover {
        background-color: #f1f5f9; /* Light gray on hover for rows */
    }

    a {
        color: #3b82f6; /* Link color */
        text-decoration: none; /* Remove underline from links */
        transition: color 0.3s; /* Smooth transition for hover */
    }

    a:hover {
        color: #2563eb; /* Darker blue on hover */
    }

    button {
        background-color: #f87171; /* Red background for delete button */
        color: white; /* White text */
        border: none; /* Remove border */
        border-radius: 4px; /* Rounded corners */
        padding: 5px 10px; /* Padding inside button */
        cursor: pointer; /* Pointer on hover */
        transition: background-color 0.3s; /* Smooth background transition */
    }

    button:hover {
        background-color: #ef4444; /* Darker red on hover */
    }
</style>

<form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
        {{ __('Logout') }}
    </button>
</form>

<a href="http://127.0.0.1:8000/loan-application" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
    Go to Loan Application
</a>
<div class="flex justify-center mb-6">
    <h1  class="text-2xl font-bold text-white">Dashboard</h1>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Occupation</th>
                <th>Monthly Salary</th>
                <th>Paysheet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loanApplications as $application)
            <tr>
                <td>{{ $application->name }}</td>
                <td>{{ $application->email }}</td>
                <td>{{ $application->tel }}</td>
                <td>{{ $application->occupation }}</td>
                <td>{{ $application->monthly_salary }}</td>
                <td><a href="{{ route('loan.download', $application->id) }}">Download Paysheet</a>

</td>
                <td>
                    <a href="{{ route('loan.edit', $application->id) }}">Edit</a> |
                    <form action="{{ route('loan.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


