<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCompanyTypeRequest;
use App\Http\Requests\StoreCompanyTypeRequest;
use App\Http\Requests\UpdateCompanyTypeRequest;
use App\Models\CompanyType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CompanyTypeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('company_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CompanyType::query()->select(sprintf('%s.*', (new CompanyType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'company_type_show';
                $editGate      = 'company_type_edit';
                $deleteGate    = 'company_type_delete';
                $crudRoutePart = 'company-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.companyTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('company_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyTypes.create');
    }

    public function store(StoreCompanyTypeRequest $request)
    {
        $companyType = CompanyType::create($request->all());

        return redirect()->route('admin.company-types.index');
    }

    public function edit(CompanyType $companyType)
    {
        abort_if(Gate::denies('company_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyTypes.edit', compact('companyType'));
    }

    public function update(UpdateCompanyTypeRequest $request, CompanyType $companyType)
    {
        $companyType->update($request->all());

        return redirect()->route('admin.company-types.index');
    }

    public function show(CompanyType $companyType)
    {
        abort_if(Gate::denies('company_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyTypes.show', compact('companyType'));
    }

    public function destroy(CompanyType $companyType)
    {
        abort_if(Gate::denies('company_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyTypeRequest $request)
    {
        $companyTypes = CompanyType::find(request('ids'));

        foreach ($companyTypes as $companyType) {
            $companyType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
