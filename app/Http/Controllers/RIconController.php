<?php

namespace App\Http\Controllers;

use App\Http\Requests\RIconStoreRequest;
use App\Http\Requests\RIconUpdateRequest;
use App\Http\Resources\RIconCollection;
use App\Http\Resources\RIconResource;
use App\Models\RIcon;
use Illuminate\Http\Request;

class RIconController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\RIconCollection
     */
    public function index(Request $request)
    {
        $rIcons = RIcon::orderBy('updated_at', 'DESC')->get();

        return new RIconCollection($rIcons);
    }

    /**
     * @param \App\Http\Requests\RIconStoreRequest $request
     * @return \App\Http\Resources\RIconResource
     */
    public function store(RIconStoreRequest $request)
    {
        $rIcon = RIcon::create($request->validated());

        return redirect('ref_icon');
        // return new RIconResource($rIcon);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RIcon $rIcon
     * @return \App\Http\Resources\RIconResource
     */
    public function show(Request $request, RIcon $rIcon)
    {
        return new RIconResource($rIcon);
    }

    /**
     * @param \App\Http\Requests\RIconUpdateRequest $request
     * @param \App\Models\RIcon $rIcon
     * @return \App\Http\Resources\RIconResource
     */
    public function update(RIconUpdateRequest $request, RIcon $rIcon)
    {
        $rIcon->update($request->validated());
        return redirect('ref_icon');
        // return new RIconResource($rIcon);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RIcon $rIcon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RIcon $rIcon)
    {
        $rIcon->delete();
        return redirect('ref_icon');
        // return response()->noContent();
    }
}
