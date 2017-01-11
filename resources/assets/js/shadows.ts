import { getContainer, getCenter, raf, query, queryAll, MousePosition, State } from './lib/dom'
import { shadowOffsetInContainer } from './lib/space'

const updateShadows = 
    (subjects: HTMLElement[], container: HTMLElement, mouse: MousePosition) => 
        subjects.forEach(subject => updateShadow(subject, container, mouse))

const updateShadow = 
    (subject: HTMLElement, container: HTMLElement, mouse: MousePosition) => {
        const { x, y } = 
            shadowOffsetInContainer(
                getContainer(container),
                getCenter(subject),
                { ...mouse, strength: 8 }
            )

        subject.style.boxShadow = `${x}px ${y}px 20px rgba(0, 0, 0, .3)`
    }

queryAll('.js-shadows-container').forEach((container: HTMLElement) => {
    const subjects = 
        <HTMLElement[]> queryAll('.js-shadows-item', container)

    raf(({ mouse }: State) => updateShadows(subjects, container, mouse))
})
