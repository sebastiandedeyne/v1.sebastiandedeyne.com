export interface Point {
    x: number
    y: number
}

export interface Container {
    width: number
    height: number
    left: number
    top: number
}

/**
 * Determine the relative position of a point in a container. Returns `{ x, y }` 
 * coordinates, each being relative to the container on an axis.
 */
export const relativePositionInContainer = 
    (c: Container, m: Point): Point => 
        ({
            x: relativePositionOnSegment({ start: c.left, end: c.left + c.width }, m.x),
            y: relativePositionOnSegment({ start: c.top, end: c.top + c.height }, m.y)
        })

/**
 * Determine the relative position of a point on a segment. An segment has a 
 * start and end point on an axis.
 */
export const relativePositionOnSegment =
    (segment: { start: number, end: number }, position: number): number =>
        // If the point is located before the axis, it's position is 0
        //     ---*--______----
        position < segment.start ? 0 :
            // If the point is located after the axis, it's position is 1
            //     -----____----*--
            position > segment.end ? 1 :
                // If the point is located on the axis, it's position is between 0 and 1
                //     -----___*___-----
                (position - segment.start) / (segment.end - segment.start)

/**
 * Calculate the offset of a shadow from it's subject in a container which 
 * serves as a limit for the light source.
 */
export const shadowOffsetInContainer =
    (container: Container, subject: Point, flame: Point & { strength: number }): Point =>
        shadowOffset(
            relativePositionInContainer(container, subject),
            { ...relativePositionInContainer(container, flame), strength: flame.strength }
        )

/**
 * Calculate the offset of a shadow from it's subject.
 */
export const shadowOffset = 
    (subject: Point, flame: Point & { strength: number }): Point => 
        ({
            x: (subject.x - flame.x) * flame.strength,
            y: (subject.y - flame.y) * flame.strength
        })