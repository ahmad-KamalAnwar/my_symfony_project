<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;


class ShipmentController extends AbstractController
{
    /**
     * @Route("/api/shipment-calculate-co2", methods={"POST"})
     *
     * @OA\Post(
     *     path="/api/shipment-calculate-co2",
     *     tags={"Shipment"},
     *     summary="Calculate CO2 emissions for a shipment",
     *     @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="expedition_weight", type="number"),
     *              @OA\Property(property="route", type="array", @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="type", type="string"),
     *                  @OA\Property(property="vehicle", type="object", @OA\Property(property="type", type="string"), @OA\Property(property="fuel", type="string")),
     *                  @OA\Property(property="origin", type="object", @OA\Property(property="latitude", type="number"), @OA\Property(property="longitude", type="number"))),
     *                  @OA\Property(property="destination", type="object", @OA\Property(property="latitude", type="number"), @OA\Property(property="longitude", type="number")))
     *              )
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean"),
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object"),
     *             @OA\Property(property="errors", type="object", nullable=true),
     *         )
     *     )
     * )
     */
    public function calculateCO2(Request $request): JsonResponse
    {
        // We can get request data by using the following line
        json_decode($request->getContent(), true);

        return $this->json(
            [
                'status' => true,
                'message' => 'OK',
                'data' => [
                    'Results' => 'Tank-to-wheels & Well-to-wheels emissions (in kg CO2)',
                    'TTW_emissions' => 0.1282,
                    'WTW_emissions' => 0.1555,
                ],
                'errors' => null,
            ]
        );
    }
}
