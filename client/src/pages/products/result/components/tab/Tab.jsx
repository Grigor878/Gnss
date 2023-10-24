import React from 'react'
import { useTranslation } from 'react-i18next'
import './Tab.scss'
import { APP_BASE_URL } from '../../../../../apis/config'
import { extractFileName } from '../../../../../helpers/formatters'

export const Tab = ({ active, setActive, description, files, media }) => {
    const { t } = useTranslation()

    return (
        <nav className='tab'>
            <ul className='tab-list'>
                <li
                    onClick={() => setActive('description')}
                    className={active === "description" ? 'tab-linkActive' : 'tab-link'}
                >
                    {t("description")}
                </li>
                {files?.length && <li
                    onClick={() => setActive('files')}
                    className={active !== "files" ? 'tab-link' : 'tab-linkActive'}

                >
                    {t("download")}
                </li>}
                {media?.length && <li
                    onClick={() => setActive('media')}
                    className={active !== "media" ? 'tab-link' : 'tab-linkActive'}

                >
                    {t("media")}
                </li>}
            </ul>

            {active === "description"
                ? <div className='tab-context'>
                    <p>{t(description)}</p>
                </div>
                : active === "files"
                    ? <div className='tab-context'>
                        {files?.map((el) => {
                            return (
                                <a key={el.id} href={APP_BASE_URL + el} target='/blank'>{extractFileName(el)}</a>
                            )
                        })}
                    </div>
                    : <div className='tab-context'>
                        {media?.map((el) => {
                            return (
                                <iframe
                                    width="100%"
                                    height="505"
                                    src={el}
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowFullScreen
                                    title="Embedded youtube"
                                />
                            )
                        })}
                    </div>
            }
        </nav>
    )
}
