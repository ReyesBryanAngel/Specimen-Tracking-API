<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecimenFormResource;
use App\Models\SpecimenForm;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\SpecimenTrackingRequest;


class SpecimenTrackingController extends Controller
{

    const RECORD_NOT_FOUND = "Sample does not exist";
    public Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function createSample(SpecimenTrackingRequest $specimenTrackingRequest)
    {
        $validatedData = $specimenTrackingRequest->validated();
        SpecimenForm::create($validatedData);

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Sample has been created!'
        ], Response::HTTP_OK);
    }

    public function updateSample(SpecimenTrackingRequest $specimenTrackingRequest, $id)
    {
        try {
            $validatedData = $specimenTrackingRequest->validated();
            $specimenForm = SpecimenForm::findOrFail($id);
            $specimenForm->update($validatedData);
    
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Sample has been updated'
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => self::RECORD_NOT_FOUND
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function showSpecificSample($id)
    {
        $specimenForm = SpecimenForm::find($id);

        if (! $specimenForm) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'status' => 'failed',
                'message' => self::RECORD_NOT_FOUND
            ], Response::HTTP_NOT_FOUND);
        }
     
        return new SpecimenFormResource($specimenForm);
    }

    public function showAllSample()
    {
        $specimenForms = SpecimenForm::all();
        $formattedSpecimenForms = SpecimenFormResource::collection($specimenForms);

        return response()->json($formattedSpecimenForms, Response::HTTP_OK);
    }
}
