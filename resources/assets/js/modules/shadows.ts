import { getContainer, getCenter, raf, query, queryAll, MousePosition, State } from '../lib/dom'
import { shadowOffsetInContainer } from '../lib/space'

interface Settings {
    container: string
    subjects: string
    strength: number
    spread: number 
}

export function shadows({ container: containerSelector, subjects: subjectSelector, strength, spread }: Settings) {
    
    queryAll(containerSelector).forEach((container: HTMLElement) => {

        const subjects = <HTMLElement[]> queryAll(subjectSelector, container)

        raf(({ mouse }: State) => {
            subjects.forEach((subject) => {
                const { x, y } = shadowOffsetInContainer(
                    getContainer(container),
                    getCenter(subject),
                    { ...mouse, strength }
                )

                subject.style.boxShadow = `${x}px ${y}px ${spread}px rgba(0, 0, 0, .3)`
            })
        })
    })
}
