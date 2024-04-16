<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Permission;
class moduleListAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Get the dynamic module slug from the request
         $moduleSlug = $request->route('module');

        //  try {
        //      // Attempt to create the permission if it doesn't exist
        //     $parent = Permission::firstOrCreate(['name' => "Module_Master_{$moduleSlug}",'parent_id'=>2]);
        //     $permission = Permission::firstOrCreate(['name' => "Module_List_{$moduleSlug}",'parent_id'=>$parent->id]);
        //  } catch (\Exception $e) {
        //      // Handle the exception (log, notify, etc.)
        //      // For now, we'll just log a message
        //      \Log::error("Error creating permission: {$e->getMessage()}");
        //  }
        
         // Check if the user has the required permission for the dynamic module
         if (!auth()->guard('admin')->user()->can("Module_List_{$moduleSlug}")) {
             abort(403, 'Unauthorized action.');
         }
 
        
 
         return $next($request);
    }
}
