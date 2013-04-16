<?php

namespace Claroline\CoreBundle\Library\Event;

class LogResourceMoveEvent extends LogGenericEvent
{
    const action = 'resource_move';

    /**
     * Constructor.
     * $resource is the moved object
     * while $source is the original object's parent (before move action)
     */
    public function __construct($resource, $source)
    {
        parent::__construct(
            self::action,
            array(
                'resource' => array(
                    'name' => $resource->getName(),
                    'path' => $resource->getPathForDisplay()
                ),
                'workspace' => array(
                    'name' => $resource->getWorkspace()->getName()
                ),
                'owner' => array(
                    'last_name' => $resource->getCreator()->getLastName(),
                    'first_name' => $resource->getCreator()->getFirstName()
                ),
                'source' => array(
                    'resource' => array(
                        'id' => $source->getId(),
                        'name' => $source->getName(),
                        'path' => $source->getPathForDisplay()
                    ),
                    'workspace' => array(
                        'id' => $source->getWorkspace()->getId(),
                        'name' => $source->getWorkspace()->getName()
                    )
                )
            ),
            null,
            null,
            $resource,
            null,
            $resource->getWorkspace(),
            $resource->getCreator()
        );
    }
}